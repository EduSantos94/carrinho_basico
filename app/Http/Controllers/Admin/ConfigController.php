<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request){

        $lista = [
            'Ovo',
            'Farinha'
        ];

        $data = [
            'nome' => 'Eduardo',
            'idade' => '25',
            'lista' => $lista
        ];

        // echo $request->method();

        echo view('admin.config',$data);
    }

    public function home(){
        echo 'home';
    }

    public function menu(){
        echo 'menu';
    }
}
