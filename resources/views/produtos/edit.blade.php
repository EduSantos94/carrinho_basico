@extends('layouts.admin')

@section('title','Edição de nomes')

@section('content')
    <h1>Edição</h1>

    <form method="POST">
        @csrf

        @if(session('warning'))
            <x-alert>
                {{ session('warning') }}
            </x-alert>
        @endif

        <label>
            Nome:<br>
        <input class="form-control" type="text" name="nome" value='{{ $data->nome }}'/>
        </label><br>

        <label>
            Valor:<br>
            <input class="form-control" type="text" name="valor" value='{{ $data->valor }}'/>
        </label><br>

        <label>
            Saldo:<br>
            <input class="form-control" type="text" name="saldo" value='{{ $data->saldo }}'/>
        </label><br>

        <label>
            Fornecedor:<br>
            <select class="form-control" name="fornecedor">
                <option>Selecione fornecedor</option>
                @foreach ($fornecedores as $forn)
                    @if ($forn->id == $data->fornecedor)
                        <option value="{{ $forn->id }}" selected>
                            {{ $forn->nome }}
                        </option>
                    @else
                        <option value="{{ $forn->id }}">
                            {{ $forn->nome }}
                        </option>
                    @endif
                @endforeach
                </select>
        </label><br>

        <input class="btn btn-success" type="submit" value="Salvar"/>

    </form>
@endsection
