@extends('layouts.admin')

@section('title','Listagem de fornecedores')

@section('content')
    <h1>Listagem de fornecedores</h1>

    <a href="{{ route('fornecedores.add') }}" class="btn btn-success">Adicionar</a>

    @if ( !empty($list) )
        <table class="table table-striped">
            <tr>
                <td>Nome</td>
                <td>Ações</td>
            </tr>
            @foreach ($list as $item)
                <tr>
                    <td>
                        {{$item->nome}}
                    </td>
                    <td>
                        <a href="{{ route('fornecedores.edit', ['id'=>$item->id]) }}" class="btn btn-primary">
                            Editar
                        </a>
                        <a href="{{ route('fornecedores.del', ['id'=>$item->id]) }}" class="btn btn-danger"
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
