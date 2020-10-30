@csrf {{-- Token que valida se a requisição é segura--}}
<div class="form-group">
    Nome do produto: <input type="text" class="form-control" name="name" value="{{ $product->name ?? old('name')}}"><br>
</div>
<div class="form-group">
    Quantidade:      <input type="number" class="form-control" name="quantity" value="{{ $product->quantity ?? old('quantity')}}"><br>
</div>
<div class="form-group">
    Valor Unitário:  <input type="number" class="form-control" name="value" step="0.01" value="{{ $product->value ?? old('value')}}"><br>
</div>