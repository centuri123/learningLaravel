@extends('admin.layouts.template')

@section('title', 'Cadastro de Produto')

@section('content')
    <a href="{{route('products.index')}}">Home</a>
    <hr>    
    <h2>Cadastrar produto:</h2>

    <form action="{{route('products.store')}}" method="post">
        @csrf {{-- Token que valida se a requisição é segura--}}
        Nome do produto: <input type="text" name="name"><br>
        Quantidade:      <input type="number" name="quantity"><br>
        Valor Unitário:  <input type="number" name="value" step="0.01"><br>
        <button type="submit">Cadastrar</button>
    </form>
@endsection