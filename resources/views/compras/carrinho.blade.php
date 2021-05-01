@extends('layouts.frontend')

@section('title','Carrinho')

@section('content')
    <h1>Carrinho</h1>

    <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>

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
                        <a href="{{ route('carrinho.delete', ['id'=>$item->id]) }}"
                            class="btn btn-danger" onclick="return alert('Apagado')">
                            Remover
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        Não há items.
    @endif
@endsection
