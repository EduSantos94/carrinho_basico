@extends('layouts.admin')

@section('title','Adição de nomes')

@section('content')
    <h1>Adição</h1>

    <form method="POST">
        @csrf

        @if($errors->any())
            <x-alert>
                @foreach($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </x-alert>
        @endif

        <label>
            Nome:<br>
            <input class="form-control" type="text" name="nome"/>
        </label><br>

        <label>
            Valor:<br>
            <input class="form-control" type="text" name="valor"/>
        </label><br>

        <label>
            Saldo:<br>
            <input class="form-control" type="text" name="saldo"/>
        </label><br>

        <label>
            Fornecedor:<br>
            <select class="form-control" name="fornecedor">
                <option>Selecione fornecedor</option>
                @foreach ($data as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
                </select>
        </label><br>

        <input class="btn btn-success" type="submit" value="Adicionar"/>

    </form>
@endsection
