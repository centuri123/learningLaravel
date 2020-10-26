<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    use HasFactory;

    public function getAll()
    {
        $products = DB::table('products')
                        ->select(['productId', 'name', 'quantity', 'value'])
                        ->get();
        return $products;
    }

    public function getOne($productId)
    {
        //DB::enableQueryLog(); 
        $product = DB::table('products')
                       ->select(['name', 'quantity', 'value'])
                       ->where('productId', '=', $productId)
                       ->get();
        //dd(DB::getQueryLog()); Visualizar como está sendo gerada a query
        return $product;
    }

    public function insert($product){
        DB::table('products')->insert([
             'name'     => $product['name'],
             'quantity' => $product['quantity'],
             'value'    => $product['value']
        ]);
    }

    public function deleteProduct($productId)
    {
        DB::table('products')
            ->where('productId','=',$productId)
            ->delete();
    }

    public function alter($productId, $altProduct){
       $keys = array_keys($altProduct);
       DB::table('products')
           ->where('productId', '=', $productId)
           ->update([$keys[0] => $altProduct['name'], $keys[1] => $altProduct['quantity'], $keys[2] => $altProduct['value']]); 
    }
}
