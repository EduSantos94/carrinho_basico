@extends('layouts.admin')

@section('title','Listagem de produtos')

@section('content')
    <h1>Listagem de produtos</h1>

    <a href="{{ route('produtos.add') }}" class="btn btn-success">Adicionar</a>

    @if ( !empty($list) )
        <table class="table table-striped">
            <tr>
                <td>Nome</td>
                <td>Valor</td>
                <td>Quantidade</td>
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
                        {{$item->saldo}}
                    </td>
                    <td>
                        <a href="{{ route('produtos.edit', ['id'=>$item->id]) }}" class="btn btn-primary">
                            Editar
                        </a>
                        <a href="{{ route('produtos.del', ['id'=>$item->id]) }}" class="btn btn-danger"
                            onclick="return confirm('Tem certeza eu deseja excluir')" >
                            Excluir
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        Não há items.
    @endif
@endsection
