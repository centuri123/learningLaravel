@extends('admin.layouts.template')

@section('title','Gestão de Produtos')

@section('content')
    <center>
        <a href="{{route('products.create')}}" class="btn btn-success">Cadastrar</a> 
        <a href="{{route('products.deleteAll')}}" class="btn btn-danger">Apagar geral</a>
    </center>
    <hr>
    <h1>Lista de produtos:</h1>
    <form action="{{route('products.search')}}" method="post" class="form-inline">
        @csrf
        <input type="text" name="filter" class="form-control" placeholder="filtrar" value="{{$filters['filter'] ?? ''}}">
        <button type="submit" class="btn btn-warning">Pesquisar</button>
    </form>
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
                                        @if (isset($filters))
                                            <td><h2>Não foram encontrados resultados na pesquisa!</h2></td>
                                        @else
                                            <td><h2>Não existem Produtos cadastrados!</h2></td>
                                        @endif
                                    </tr>
                                </table>
                        @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        @if (isset($filters))
            {!! $products->appends($filters)->links() !!}
        @else
            {!! $products->links() !!}
        @endif
    </div>
@endsection

@push('styles')
    <style>
        h1{
            text-align: center;
        }
    </style>    
@endpush
