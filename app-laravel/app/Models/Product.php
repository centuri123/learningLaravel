<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productId';
    protected $fillable   = [
        'name',
        'quantity',
        'value',
    ];

     /**
     * Função que deleta tudo por conta da preguiça de ir um por um :D
     */
    public function deleteAllProducts(){
        DB::table('products')->delete();
    }

    /**
     * 
        Criei quando ainda não conhecia as funções herdadas da Model
        e também para fixar o funcionamento do ORM no Laravel.
     */
    // public function getAll()
    // {
    //     $products = DB::table('products')
    //                     ->select(['productId', 'name', 'quantity', 'value'])
    //                     ->get();
    //     return $products;
    // }

    // public function getOne($productId)
    // {
    //     //DB::enableQueryLog(); 
    //     $product = DB::table('products')
    //                    ->select(['name', 'quantity', 'value'])
    //                    ->where('productId', '=', $productId)
    //                    ->get();
    //     //dd(DB::getQueryLog()); Visualizar como está sendo gerada a query
    //     return $product;
    // }

    // public function insert($product){
    //     DB::table('products')->insert([
    //          'name'     => $product['name'],
    //          'quantity' => $product['quantity'],
    //          'value'    => $product['value']
    //     ]);
    // }

    // public function deleteProduct($productId)
    // {
    //     DB::table('products')
    //         ->where('productId','=',$productId)
    //         ->delete();
    // }

    // public function alter($productId, $altProduct){
    //    $keys = array_keys($altProduct);
    //    DB::table('products')
    //        ->where('productId', '=', $productId)
    //        ->update([$keys[0] => $altProduct['name'], $keys[1] => $altProduct['quantity'], $keys[2] => $altProduct['value']]); 
    // }
}
