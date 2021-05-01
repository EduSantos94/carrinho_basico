@extends('layouts.frontend')

@section('title','Listagem de produtos')

@section('content')
    <h1>Compras</h1>

    @if ( !empty($list) )
        <table class="table table-striped">
            <tr>
                <td>Nome</td>
                <td>Valor</td>
                <td>Ações</td>
            </tr>
            @foreach ($list as $item)
                <tr>
                    <td>
                        {{$item->nome}}
                    </td>
                    <td>
                        {{$item->valor}}
                    </td>
                    <td>
                        <a href="{{ route('compras.add', ['id'=>$item->id]) }}"
                            class="btn btn-primary" onclick="return alert('Adicionado')">
                            Adicionar no carrinho
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        Não há items.
    @endif
@endsection
