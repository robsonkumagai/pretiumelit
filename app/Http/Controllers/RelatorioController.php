<?php

namespace App\Http\Controllers;

use App\Produtos;

class RelatorioController extends Controller
{
    public function index() {
        $produtos = Produtos::get();

        foreach($produtos as $produto) {

            $diferencaValor = $produto->preco - $produto->preco_minimo;

            //Verificar cálculo

            if(($produto->preco != 0 && $produto->preco_minimo != 0) && ($produto->preco != $produto->preco_minimo)){
                $diferencaPorc = 100 / ($produto->preco / ($produto->preco - $produto->preco_minimo));
            } else {
                $diferencaPorc = 0;
            }

            if($diferencaPorc > 0){
                $produto->diffPorc = '<span style="color:red;">'.number_format($diferencaPorc, 2, ',', ' ').'%</span>';
            } else {
                $produto->diffPorc = '<span style="color:green;">'.number_format($diferencaPorc, 2, ',', ' ').'%</span>';
            }

            if($diferencaValor > 0){
                $produto->diffReais = '<span style="color:red;">R$'.number_format($diferencaValor, 2, ',', ' ').'</span>';
            } else {
                $produto->diffReais = '<span style="color:green;">R$'.number_format($diferencaValor, 2, ',', ' ').'</span>';
            }
        }

        return $produtos;
    }

}
