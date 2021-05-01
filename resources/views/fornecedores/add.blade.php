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
            Titulo:<br>
            <input class="form-control" type="text" name="nome"/>
        </label>

        <input class="btn btn-success" type="submit" value="Adicionar"/>

    </form>
@endsection
