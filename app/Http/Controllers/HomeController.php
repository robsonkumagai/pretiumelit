<?php

namespace App\Http\Controllers;

use App\Concorrentes;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produtos;
use Illuminate\Support\Facades\Mail;
use Orchestra\Support\Facades\Form;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $buybox = Charts::database(Produtos::all(),'pie', 'highcharts')
            ->title('Buybox')
            ->elementLabel("Total")
            ->dimensions(500, 300)
            ->responsive(false)
            ->groupBy('status');

        $categoria = Charts::database(Produtos::all(),'bar', 'highcharts')
            ->title('Categoria')
            ->elementLabel("Total")
            ->dimensions(500, 300)
            ->responsive(false)
            ->groupBy('categoria');

        $marcas = Charts::database(Produtos::all(),'donut', 'highcharts')
            ->title('Marcas')
            ->elementLabel("Total")
            ->dimensions(500, 300)
            ->responsive(false)
            ->groupBy('marca');

        $concorrentes = Charts::database(Concorrentes::all(),'percentage', 'justgage')
            ->title('Concorrentes')
            ->elementLabel("Total")
            ->dimensions(500, 300)
            ->responsive(false)
            ->groupBy('nome');


        $contadorProduto = DB::table('links_canais')->count();

        $valorTotal = DB::table('comparador_produtos')
            ->select(DB::raw('SUM(preco) as total'))
            ->get();

        $valorTotal = $this->toMoney($valorTotal[0]->total,2);

        return view('home',compact('buybox','categoria','marcas','concorrentes','contadorProduto', 'valorTotal'));
    }

    public function graficos() {
        $buybox = Charts::database(Produtos::all(),'bar', 'highcharts')
            ->title('Buybox')
            ->elementLabel("Total")
            ->dimensions(1000, 400)
            ->responsive(false)
            ->groupBy('status');

        $categoria = Charts::database(Produtos::all(),'bar', 'highcharts')
            ->title('Categoria')
            ->elementLabel("Total")
            ->dimensions(1000, 400)
            ->responsive(false)
            ->groupBy('categoria');

        $marcas = Charts::database(Produtos::all(),'bar', 'highcharts')
            ->title('Marcas')
            ->elementLabel("Total")
            ->dimensions(1000, 400)
            ->responsive(false)
            ->groupBy('marca');

        $concorrentes = Charts::database(Concorrentes::all(),'bar', 'highcharts')
            ->title('Concorrentes')
            ->elementLabel("Total")
            ->dimensions(1000, 400)
            ->responsive(false)
            ->groupBy('nome');

        return view('buybox',compact('buybox','categoria','marcas','concorrentes'));
    }

    public function contatoEmail(Request $request) {
        $conteudo = $request->all();

        Mail::send('emails.contatoEmail', ["form" => $conteudo], function ($message)
        {
            $message->from('pretiumelit@outlook.com', 'Pretium Elit');
            $message->to('pretiumelit@gmail.com');

        });

        print_r(response()); exit;

        //Alterar o redirecionamento
        return response()->json(['message' => 'Request completed']);
    }

    public function relatorio() {
        return view('relatorio');
    }

    public function blog() {
        return view('blog');
    }
}
