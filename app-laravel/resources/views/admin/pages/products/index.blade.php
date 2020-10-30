@extends('admin.layouts.template')

@section('title','Gestão de Produtos')

@section('content')
    <center>
        <a href="{{route('products.create')}}" class="btn btn-success">Cadastrar</a> 
        <a href="{{route('products.deleteAll')}}" class="btn btn-danger">Apagar geral</a>
    </center>
    <hr>
    <h1>Lista de produtos:</h1>    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-info">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade Est.</th>
                    <th>Valor Unit.</th>
                    <th width="100px"></th>
                    <th width="100px"></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$product->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->value}}</td>
                            <td><a href="{{route('products.edit',$product->productId)}}" class="btn btn-secondary">Alterar</a></td>
                            <td><a href="{{route('products.show',$product->productId)}}" class="btn btn-danger">Excluir</a></td>
                        </tr>
                            @empty
                                <table align="center">
                                    <tr>
                                        <td><h2>Não existem Produtos cadastrados!</h2></td>
                                    </tr>
                                </table>
                        @endforelse
            </tbody>
        </table>
    </div>
        {{-- {{!! $products->links() !!}} --}}
@endsection

@push('styles')
    <style>
        h1{
            text-align: center;
        }
    </style>    
@endpush
