<?php

namespace App\Http\Controllers;
set_time_limit(-1);
ini_set('default_charset','UTF-8');

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Sunra\PhpSimple\HtmlDomParser;

class ConcorrentesController extends Controller
{

    public function index() {
        DB::table('comparador_produtos')->truncate();
        DB::table('comparador_concorrentes')->truncate();

        $data = DB::table('links_canais')
            ->where('ativo','=',1)
            ->get()
            ->all();

        foreach ($data as $row) {
            $url = $row->url;
            sleep(0.25);
            ob_end_flush();
            echo 'Analisando link: '. $url .'</br>';
            ob_start();
            flush();

            $this->buscaInfoProdutos($url);
        }
        echo '<br>Busca terminada com sucesso!';
    }

    public function buscaInfoProdutos($url) {
        $arrayLojas = array();

        if (!preg_match("/^(https|http)/", $url)){
            $url = "http://".$url;
        }

        $base_url = parse_url($url)['host']; //www.extra.com.br

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '');
        curl_setopt($ch, CURLOPT_TIMEOUT,30);

        $resp = curl_exec($ch);

        curl_setopt($ch, CURLOPT_URL, $url);

        $exec = curl_exec($ch);
        $info = curl_getinfo($ch);

        $html_read = HtmlDomParser::str_get_html($exec);
        $lojistas = array();

        preg_match('/var siteMetadata = (.*);/', $exec, $match);

        $metaData = (json_decode($match[1]));

        $product = $metaData->page->product;

        //Transforma o objeto em array e retorna as lojas com o valor ordenado
        foreach($product->sellers->id as $key=>$seller) {
            $arrayLojas[] = [
                'id'    => $seller->id,
                'nome'  => $seller->name,
                'preco' => $seller->price
            ];

            if ($key == 19198) {
                $minhaLoja = [
                    'id'    => $seller->id,
                    'nome'  => $seller->name,
                    'preco' => $seller->price
                ];
            }

            //Ordena o Array
            usort($arrayLojas, [$this, 'Cmp']);
        }

        $produto['nome']            = str_replace("'", "\'", urldecode($product->fullName));
        $produto['mktplace_id']     = $product->idSku;
        $produto['marca']           = str_replace("'", "\'", urldecode($product->nameBrand));
        $produto['categoria']       = str_replace("'", "\'", urldecode($product->categoryName));
        $produto['preco_minimo']    = $product->sellers->lowPrice;
        $produto['preco_maximo']    = $product->sellers->highPrice;
        $produto['disponivel']      = $product->StockAvailability;
        $produto['vencedor']        = $arrayLojas[0]['nome'];

        if (($minhaLoja['preco'] == $produto['preco_minimo'])) {
            if (isset($arrayLojas[1]['preco'])) {
                if (($minhaLoja['preco'] == $arrayLojas[1]['preco'])) {
                    $status = 'Empatado';
                } else {
                    $status = 'Ganhando Buybox';
                }
            } else {
                $status = 'Sem Concorrentes';
            }
        }
        if ($minhaLoja['preco'] > $produto['preco_minimo']) {
            $status = 'Perdendo Buybox';
        }

        DB::table('comparador_produtos')->insert([
            'mktplace_id'      => $produto['mktplace_id'],
            'empresa'          => $minhaLoja['nome'],
            'nome'             => $produto['nome'],
            'marca'            => $produto['marca'],
            'categoria'        => $produto['categoria'],
            'canal'            => 'extra',
            'anuncio'          => $url,
            'preco'            => $minhaLoja['preco'],
            'preco_minimo'     => $produto['preco_minimo'],
            'preco_maximo'     => $produto['preco_maximo'],
            'disponivel'       => $produto['disponivel'],
            'data'             => now(),
            'data_atualizacao' => now(),
            'status'           => $status,
            'vencedor'         => $produto['vencedor'],
        ]);

        foreach($arrayLojas as $lojista) {
            DB::table('comparador_concorrentes')->insert([
                'id_produto'       => $produto['mktplace_id'],
                'nome'             => $lojista['nome'],
                'canal'            => 'extra',
                'anuncio'          => $url,
                'preco'            => $lojista['preco'],
                'data'             => now(),
            ]);

            $resposta = 'Link cadastrado com sucesso:' . $url . '<br>';
        }
        return $resposta;
    }
}
