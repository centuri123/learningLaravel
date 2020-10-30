@extends('admin.layouts.template')

@section('title', 'Alteração de produto')

@section('content')
    @include('admin.includes.home-button')
    <h2>Alterar produto:</h2>
    @include('admin.includes.alerts')
   <form action="{{route('products.update', $id)}}" method="post" class="form">{{-- enctype="multipart/form-data" --}}
        @method('PUT')
        @include('admin.pages.products.form')
        {{--Utilizado para fins didáticos - Imagem:     <input type="file"   name="image"><br> --}} 
       <button type="submit" class="btn btn-secondary">Alterar</button>
    </form>
    
@endsection
