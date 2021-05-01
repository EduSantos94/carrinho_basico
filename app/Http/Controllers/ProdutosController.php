<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Fornecedores;

class ProdutosController extends Controller
{
    /**
     * Lista de produtos
     */
    public function list()
    {

        return view('produtos.list',[
            'list' => Produtos::all()
        ]);
    }

    /**
     * Chamada template para adicinar produtos
     */
    public function add()
    {
        return view('produtos.add',[
            'data' => Fornecedores::orderBy('nome','ASC')->pluck('nome','id')->toArray()
        ]);
    }

    /**
     * chamada post do template add
     */
    public function addAction(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string']
        ]);

        $model = new Produtos();

        $model->fill($request->all());

        $model->save();

        return redirect()->route('produtos.list');
    }

    /**
     * Template para editar produto
     */
    public function edit($id)
    {
        $data = Produtos::findOrFail($id);

        if( !empty($data) ) {
            return view('produtos.edit',[
                'data' => $data,
                'fornecedores' => Fornecedores::all()
            ]);
        } else {
            return redirect()->route('produtos.list');
        }
    }

    /**
     * post do template edit
     */
    public function editAction(Request $request, $id)
    {
        if($request->filled('nome')){
            $nome = $request->input('nome');

            $data = Produtos::findOrFail($id);

            $data->fill($request->all());

            $data->save();

            return redirect()->route('produtos.list');
        } else {
            return redirect()
                ->route('produtos.edit')
                ->with('warning','Você não preencheu o nome');
        }
    }

    /**
     * Apagar registro
     */
    public function del($id)
    {
        $res = Produtos::destroy($id);

        return redirect()->route('produtos.list');
    }
}
