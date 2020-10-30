@extends('admin.layouts.template')

@section('title', 'Exclusão de produto')

@section('content')
    @include('admin.includes.home-button')
    <h2>Excluir produto:</h2>

    <form action="{{route('products.destroy', $id)}}" method="post" class="form">
        @method('DELETE')
        @csrf
        <div class="form-group">
            Nome do produto: {{$product->name}}<br>
        </div>
        <div class="form-group">
            Quantidade:      {{$product->quantity}}<br>
        </div>
        <div class="form-group">
            Valor Unitário: {{$product->value}}<br>
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    
@endsection
