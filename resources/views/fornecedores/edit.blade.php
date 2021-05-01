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
        </label>

        <input class="btn btn-success" type="submit" value="Salvar"/>

    </form>
@endsection
