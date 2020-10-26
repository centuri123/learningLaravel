@extends('admin.layouts.template')

@section('title', 'Exclusão de produto')

@section('content')
    <a href="{{route('products.index')}}">Home</a>
    <hr>    
    <h2>Excluir produto:</h2>

    <form action="{{route('products.destroy', $id)}}" method="post">
        @method('DELETE')
        @csrf
        Nome do produto: {{$product[0]->name}}<br>
        Quantidade:      {{$product[0]->quantity}}<br>
        Valor Unitário: {{$product[0]->value}}<br>
        <button type="submit">Excluir</button>
    </form>
    
@endsection
