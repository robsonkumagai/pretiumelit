<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Sunra\PhpSimple\HtmlDomParser;

class CrawlerController extends Controller
{
    protected $response;
    protected $_url;
    protected $_canal;
    protected $_baseLink;
    protected $_seen = array();
    protected $_verbose = 0; //Detalhado
    protected $_totalProducts;
    protected $_log;

    public function index() {
        $verbose = 1;
        $url = 'https://www.extra.com.br/Lojista/19198/Eletro-oferta?Filtro=L19198&Ordenacao=precoCrescente';

        preg_match('/(http|https)\:\/\/(www.|)(.*).(com|.com.br)/', $url, $matches);

        $this->_canal = $matches[3]; //retornar 'extra'

        $parseUrl = parse_url($url); //Url separando loja e ordenação

        $this->_baseLink = $parseUrl['scheme']."://".$parseUrl['host']; //www.extra.com.br

        Log::info('Iniciando leitura do canal: Extra');
        DB::table('links_canais')->where('canal','=','extra')->delete();

        $pages = $this->getLinksToLookUp(); //Olha a url e retorna a quantidade de páginas

        foreach($pages as $page){
            $this->crawl_page($page,$url);
        }

        //$this->_log->info("Leitura das urls finalizadas.", array('numberUrls'=>$db->query("SELECT COUNT(*) FROM links_canais where canal='$this->_canal'")));
    }


    //Links a serem visitados
    public function getLinksToLookUp() {
        //Função ok
        $url = 'https://www.extra.com.br/Lojista/19198/Eletro-oferta?Filtro=L19198&Ordenacao=precoCrescente';

        $urls = array();

        list($content, $httpcode, $time) = $this->_getContent($url."&paginaAtual=1");

        $html_read = HtmlDomParser::str_get_html($content);

        $numberOfPages = 1;

        foreach($html_read->find('div.pagination ul.ListaPaginas li.last') as $botaoFinal){
            if(array_key_exists('href', $botaoFinal->children[0]->attr)){
                $urlFinal = $botaoFinal->children[0]->href;
                if(strpos($urlFinal, 'paginaAtual') !== 0){
                    preg_match('/(.*)paginaAtual=(.*)/', $urlFinal, $matches);
                    $numberOfPages = $matches[2];
                    if(is_numeric($numberOfPages))
                        break;
                }
            }
        }

        var_dump($numberOfPages);

        for($i=1; $i<=$numberOfPages; $i++){
            $urls[] = $this->_url.'&paginaAtual='.$i;
        }

        return $urls;
    }

    public function _getContent($url) {
        $handle = curl_init();

        curl_setopt($handle, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($handle, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($handle, CURLOPT_AUTOREFERER, true);
        curl_setopt($handle, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_COOKIEFILE, '');
        curl_setopt($handle, CURLOPT_TIMEOUT,30);
        curl_setopt($handle, CURLOPT_URL, $this->_baseLink);
        curl_exec($handle);
        curl_setopt($handle, CURLOPT_URL, $url);

        $response = curl_exec($handle);
        $time     = curl_getinfo($handle, CURLINFO_TOTAL_TIME);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        curl_close($handle);
        return array($response, $httpCode, $time);
    }

    public function crawl_page($url,$page) {
        $url = 'https://www.extra.com.br/Lojista/19198/Eletro-oferta?Filtro=L19198&Ordenacao=precoCrescente';

        $this->_seen[$url] = true;
        list($content, $httpcode, $time) = $this->_getContent($url);
        if($this->_verbose)
            $this->_printResult($url, $httpcode, $time);

        $this->_processAnchors($content);
    }

    protected function _printResult($url, $httpcode, $time) {
        ob_end_flush();
        $count = count($this->_seen);
        echo "N::$count,CODE::$httpcode,TIME::$time, URL::$url <br>";
        ob_start();
        flush();
    }

    protected function _processAnchors($content) {
        $html_read = HtmlDomParser::str_get_html($content);

        foreach($html_read->find('a.link') as $tag){
            $link = $tag->href;

            DB::table('links_canais')->insert([
                ['url' => $link, 'canal' => 'extra']
            ]);

            echo 'URL CADASTRADA: '.$link."</br>";
        }
    }
}
