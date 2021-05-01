@extends('layouts.frontend')

@section('title','Edição de nomes')

@section('content')
    <h1>Checkout</h1>

    <form method="POST">
        @csrf

        @if(session('warning'))
            <x-alert>
                {{ session('warning') }}
            </x-alert>
        @endif

        <label>
            Total do pedido R$:<br>
        <input class="form-control" type="text" name="nome" value='{{ $total }}'/>
        </label><br>

        <label>
            Cep:<br>
            <input  id="cep" class="form-control" type="text" pattern="\d{5}-{0,1}\d{3}" maxlength="9" name="cep"/>
            <br>
            <button class="btn w3-blue-grey" onclick="findCep(this)" type="button">
                Buscar Cidade
            </button>
        </label><br>

        <label>
            Cidade:<br>
            <input class="form-control" type="text" name="cidade"/>
        </label><br>

        <label>
            Estado:<br>
            <input class="form-control" type="text" name="estado"/>
        </label><br>

        <p>Frete:</p>
        <input type="radio">
        <label>R$09,99</label><br>
        <input type="radio">
        <label>R$15,99</label><br>

        <input class="btn btn-success" type="submit" value="Salvar"/>

    </form>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@push('script')
<script type="text/javascript">
    function findCep(e) {
        console.log('x');
        e.blur();
        var cep = $('input[name=cep]').val();
        $.ajax({
            method: "GET",
            url: '{{ route('consultar.cep','%') }}'.replace('%', cep),
            dataType: 'json',
            success: function(data) {
                $('input[name=cidade]').val(data.cidade);
                $('input[name=estado]').val(data.uf);
            }
        })
    }
</script>
