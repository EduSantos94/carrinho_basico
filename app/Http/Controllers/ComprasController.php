<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produtos;
use App\Compras;
use App\Correios;
use \SoapClient;

class ComprasController extends Controller
{
    /**
     * Lista produtos no shop
     */
    public function list()
    {
        return view('compras.list',[
            'list' => Produtos::where('saldo', '>', 0)->get()
        ]);
    }

    /**
     * template do carrinho
     */
    public function carrinho()
    {
        return $this->carrinhoTemplate();
    }

    /**
     * chamada post do checkout
     */
    public function checkoutAction(Request $request)
    {
        $compras = DB::table('compras')->get();

        foreach ($compras as $data) {
            $produto = Produtos::where('id','=',$data->produto)->first();

            $produto->saldo = $produto->saldo - 1;

            $produto->save();
        }
        DB::table('compras')->truncate();

        return view('compras.list',[
            'list' => Produtos::all()
        ]);
    }

    /**
     * Chama template do checkout
     */
    public function checkout()
    {
        $compras = DB::table('compras')
        ->join('produtos', 'compras.produto', '=', 'produtos.id')
        ->select('compras.*', 'produtos.nome AS nome', 'produtos.valor AS valor')
        ->get();

        $total = 0.00;

        foreach ($compras as $item) {
            $total += (float)$item->valor;
        }

        return view('compras.checkout',[
            'total' => $total
        ]);
    }

    /**
     * Remove item do carrinho
     */
    public function carrinhoDelete($id)
    {
        $res = Compras::destroy($id);

        return $this->carrinhoTemplate();
    }

    /**
     * adiciona item no carrinho
     */
    public function addAction($id)
    {
        $carrinho = new Compras();

        $carrinho->produto = $id;

        $carrinho->save();

        return view('compras.list',[
            'list' => Produtos::all()
        ]);
    }

    protected function carrinhoTemplate()
    {
        $compras = DB::table('compras')
            ->join('produtos', 'compras.produto', '=', 'produtos.id')
            ->select('compras.*', 'produtos.nome AS nome', 'produtos.valor AS valor')
            ->get();

        return view('compras.carrinho',[
            'list' => $compras
        ]);
    }

    /**
     * Chamada soap para pegar cep no webservices do correios
     */
    public function getCep($cep)
    {
        $url = 'https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl';

        $response = new SoapClient($url, array("trace" => 1, "exception" => 0));

        $data = $response->consultaCEP(['cep' => $cep]);
        $address = $data->return;

        $template = [
            'cidade' => $address->cidade,
            'uf' => $address->uf
        ];

        return $template;
    }
}
