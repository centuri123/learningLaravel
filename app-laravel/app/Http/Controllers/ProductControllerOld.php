<?php    
namespace App\Http\Controllers;

use App\Models\ProductModel;

/**
    Classe ProductController antiga - Utilizava request GET
 */

class ProductControllerOld extends Controller
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        return $this->productModel->getAll();
    }

    public function showOne($productId)
    {
        $product = $this->productModel->getOne($productId);
        if($product->isEmpty())
        {
            return 'Produto não encontrado!';
        }
        return $product;
    }

    public function insert($name, $quantity, $value)
    {
        $product = [
            'name'     => $name,
            'quantity' => $quantity,
            'value'    => $value
        ];
        $this->productModel->insert($product);
        return 'Produto inserido com sucesso!';
    }

    public function delete($productId)
    {
        $this->productModel->deleteProduct($productId);
        return 'O registro escolhido foi deletado com sucesso!';
    }

    public function alter($productId, $name, $quantity, $value)
    {
        $oldProduct = $this->productModel->getOne($productId);
        $altProduct = [
            'name'     => $name,
            'quantity' => $quantity,
            'value'    => $value 
        ];
        $this->productModel->alter($productId, $altProduct);
        $altProduct = $this->productModel->getOne($productId);

        $returnText = "Antes - Nome:{$oldProduct[0]->name} Quantidade: {$oldProduct[0]->quantity} Valor: {$oldProduct[0]->value}<br>
                       Depois - Nome:{$altProduct[0]->name} Quantidade: {$altProduct[0]->quantity} Valor: {$altProduct[0]->value}";
        return $returnText;
    }
}
