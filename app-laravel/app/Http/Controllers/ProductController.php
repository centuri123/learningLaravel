<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productModel;
    protected $request;

    public function __construct(Product $productModel, Request $request)
    {
        $this->productModel = $productModel;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productModel->paginate();
        return view('admin.pages.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreUpdateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        //dd($request->all());
        //dd($request->only(['name','quantity']));
        $this->productModel->create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($product = $this->productModel->find($id))
        {
            return view('admin.pages.products.show', ['product' => $product, 'id' => $id]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($product = $this->productModel->find($id))
        {
            return view('admin.pages.products.edit', ['product' => $product, 'id' => $id]);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\StoreUpdateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreUpdateProductRequest $request)
    {
        /**
         * 
           Utilizado para aprender sobre salvar arquivos no projeto via inputs de cadastros
         */
        //if($this->request->image->isValid()){
            //dd($this->request->image->store('products/teste'));
            //dd($this->request->image->storeAs('products',"{$id}.{$this->request->image->extension()}"));
        //}
        if(!$product = $this->productModel->find($id)){
            return redirect()->back();
        }
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$product = $this->productModel->find($id)){
            return redirect()->back();
        }
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Remove all resources from storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(){
        $this->productModel->deleteAllProducts();
        return redirect()->route('products.index');
    }

    public function search(){
        $filters = $this->request->only('filter');
        $products = $this->productModel->searchProduct($this->request->filter);
        return view('admin.pages.products.index', ['products' => $products, 'filters' => $filters]);
    }
}
