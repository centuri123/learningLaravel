@extends('admin.layouts.template')

@section('title','Gestão de Produtos')

@section('content')
    <a href="{{route('products.create')}}">Cadastrar</a>
    
    <hr>
    <h1>Lista de produtos:</h1>    

    @forelse ($products as $key => $product)
        <p>
           
            <b>Produto {{++$key}}:</b><br>
            Nome: {{$product->name}}<br>
            Quantidade em estoque: {{$product->quantity}}<br>
            Valor Unitário: {{$product->value}}<br>
            <a href="{{route('products.edit',$product->productId)}}">Alterar</a> / <a href="{{route('products.show',$product->productId)}}">Excluir</a>
            @if(!$loop->last)
                <hr>
            @endif
        </p>
    @empty
        <b>Não existem Produtos cadastrados!</b>
    @endforelse

@endsection

