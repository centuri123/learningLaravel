@extends('admin.layouts.template')

@section('title', 'Cadastro de Produto')

@section('content')
    @include('admin.includes.home-button')
    <h2>Cadastrar produto:</h2>
    @include('admin.includes.alerts')
    <form action="{{route('products.store')}}" method="post" class="form">
            @include('admin.pages.products.form')
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@endsection