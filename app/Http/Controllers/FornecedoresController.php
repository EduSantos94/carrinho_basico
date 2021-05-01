<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fornecedores;

class FornecedoresController extends Controller
{
    /**
     * Lista de fornecedores
     */
    public function list()
    {
        return view('fornecedores.list',[
            'list' => Fornecedores::all()
        ]);
    }

    /**
     * Template para adicionar fornecedor
     */
    public function add()
    {
        return view('fornecedores.add');
    }

    /**
     * post do template add
     */
    public function addAction(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string']
        ]);

        $model = new Fornecedores();

        $model->fill($request->all());

        $model->save();

        return redirect()->route('fornecedores.list');
    }

    /**
     * template para editar fornecedor
     */
    public function edit($id)
    {
        $data = Fornecedores::findOrFail($id);

        if( !empty($data) ) {
            return view('fornecedores.edit',[
                'data' => $data
            ]);
        } else {
            return redirect()->route('fornecedores.list');
        }
    }

    /**
     * chamada post do template edit
     */
    public function editAction(Request $request, $id)
    {
        if($request->filled('nome')){
            $nome = $request->input('nome');

            $data = Fornecedores::findOrFail($id);

            $data->fill($request->all());

            $data->save();

            return redirect()->route('fornecedores.list');
        } else {
            return redirect()
                ->route('fornecedores.edit')
                ->with('warning','Você não preencheu o nome');
        }
    }

    /**
     * Apaga registro
     */
    public function del($id)
    {
        $res = Fornecedores::destroy($id);

        return redirect()->route('fornecedores.list');
    }
}
