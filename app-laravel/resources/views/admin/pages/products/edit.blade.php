@extends('admin.layouts.template')

@section('title', 'Alteração de produto')

@section('content')
    <a href="{{route('products.index')}}">Home</a>
    <hr>    
    <h2>Alterar produto:</h2>

    <form action="{{route('products.update', $id)}}" method="post">
        @method('PUT')
        @csrf
        Nome do produto: <input type="text" name="name" placeholder="{{$product[0]->name}}"><br>
        Quantidade:      <input type="number" name="quantity" placeholder="{{$product[0]->quantity}}"><br>
        Valor Unitário:  <input type="number" name="value" step="0.01" placeholder="{{$product[0]->value}}"><br>
        <button type="submit">Alterar</button>
    </form>
    
@endsection
