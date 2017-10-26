<?php

namespace App\Http\Controllers;

use App\User;
use function GuzzleHttp\choose_handler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Sunra\PhpSimple\HtmlDomParser;

class ConcorrentesController extends Controller
{
    function cmp($a, $b) {
        return $a['preco'] > $b['preco'];
    }

    public function index() {
        $data = DB::table('links_canais')
            ->where('ativo','=',1)
            ->get()
            ->all();

        while($data) {
            foreach ($data as $row){
                $url = $row->url;
                sleep(0.25);
                ob_end_flush();
                //echo 'Analisando link: '.$url.' </br>';
                ob_start();
                flush();

                $contador = DB::table('comparador_produtos')
                    ->where('anuncio','=',$url)
                    ->count();

            } if ($contador > 0) {
                echo 'Link já cadastrado: '.$url.' </br>';
                $this->tryUpdateProductFromUrl($url);
            } else {
                try {
                    //$check = new check($url);
                    //$resposta = $check->requestProductInformation();
                    $resposta = $this->requestProductInformation($url);

                    print_r($resposta); exit;
/*
                    //Parando aqui

                    $prodName       = isset($resposta['nome']) ? $resposta['nome'] : '';
                    $prodMktPlaceId = isset($resposta['mktplace_id']) ? $resposta['mktplace_id'] : '';
                    $prodMarca      = isset($resposta['marca']) ? $resposta['marca'] : '';

                    if(array_key_exists('marca', $resposta)){
                        $prodMarca = $resposta['marca'];
                        unset($resposta['marca']);
                    }
                    $prodCategoria = 'Não encontrada';
                    if(array_key_exists('categoria', $resposta)){
                        $prodCategoria = $resposta['categoria'];
                        unset($resposta['categoria']);
                    }
                    unset($resposta['nome']);
                    unset($resposta['mktplace_id']);

                    $bestSeller = $resposta['best_seller'];
                    unset($resposta['best_seller']);

                    /*$base_url = parse_url($url)['host'];
                    $base_url = str_replace(".com", "", $base_url);
                    $base_url = str_replace(".br", "", $base_url);
                    $base_url = str_replace("www.", "", $base_url);

                    //base url retorna 'extra'

                    DB:table('comparador_produtos')->insert([
                       ['categoria' => $prodCategoria, 'marca' => $prodMarca, 'mktplace_id' => $prodMktPlaceId, 'nome' => $prodName, 'anuncio' => $url, 'canal' => 'extra']
                    ]);

                    /*$sqlInsert = "INSERT INTO comparador_produtos(categoria, marca, mktplace_id, nome, anuncio, canal) VALUES ('$prodCategoria', '$prodMarca', '$prodMktPlaceId', '$prodName', '$url', '$base_url')";
                    if(!$result = $db->query($sqlInsert)){
                        var_dump($sqlInsert);
                        die("INSERT comparador_produtos SQL:".$db->error);
                    }*/

                    //
                    //tryUpdateProductFromUrl($url);

                    //Até aqui está certo
                    $this->tryUpdateProductFromUrl($url);

                } catch(Exception $ex){
                    echo $ex->getMessage();
                }
            }
        }

    }

    public function requestProductInformation($url) {
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

            //Ordena o Array
            usort($arrayLojas, [$this, 'Cmp']);

            //Pega a primeira posição para o menor valor
            $bestSeller = $arrayLojas[0];
        }

        //$produto['id']              = 19198;
        $produto['nome']            = str_replace("'", "\'", urldecode($product->fullName));
        $produto['mktplace_id']     = $product->idSku;
        $produto['marca']           = str_replace("'", "\'", urldecode($product->nameBrand));
        $produto['categoria']       = str_replace("'", "\'", urldecode($product->categoryName));
        $produto['preco_minimo']    = $product->sellers->lowPrice;
        $produto['preco_maximo']    = $product->sellers->highPrice;
        $produto['best_seller']     = $bestSeller;
        $produto['disponivel']      = $product->StockAvailability;

        foreach($arrayLojas as $lojista) {

            $contadorProduto = DB::table('comparador_concorrentes')
                ->where([['id_produto','=', $produto['mktplace_id']],
                    ['canal','=', 'extra']])
                ->count();

            if ($contadorProduto == 0) {
                DB::table('comparador_concorrentes')->insert([
                    'id_produto' => $produto['mktplace_id'],
                    'nome'       => $lojista['nome'],
                    'canal'      => 'extra',
                    'link'       => $url,
                    'preco'      => $lojista['preco'],
                    'disponivel' => $produto['disponivel'],
                    'data'       => now(),
                ]);
            } else {
                DB::table('comparador_concorrentes')->increment([
                    'id_produto' => $produto['mktplace_id'],
                    'nome'       => $lojista['nome'],
                    'canal'      => 'extra',
                    'link'       => $url,
                    'preco'      => $lojista['preco'],
                    'disponivel' => $produto['disponivel'],
                    'data'       => now(),
                ]);
            }

            if ($lojista['preco'] == $produto['preco_minimo']) {
                $status = 'Ganhando Buybox';
            } else {
                $status = 'Perdendo Buybox';
            }

            DB::table('comparador_produtos')->insert([
                    'mktplace_id'  => $produto['mktplace_id'],
                    'nome'         => $produto['nome'],
                    'marca'        => $produto['marca'],
                    'categoria'    => $produto['categoria'],
                    'canal'        => 'extra',
                    'anuncio'      => $url,
                    'preco_minimo' => $produto['preco_minimo'],
                    'preco_maximo' => $produto['preco_maximo'],
                    'preco'        => $lojista['preco'],
                    'buybox'       => $lojista['nome'],
                    'esgotado'     => $produto['esgotado'],
                    'ultima_alteracao'     => now(),
                    'ultimo_status' => $status,
                ]);

            }

        echo "Para";
        exit;

        return $resposta;
    }
}
