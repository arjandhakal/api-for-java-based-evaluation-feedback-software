<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return response('Success',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {        
    
    }

    public function updateProduct(Request $request){
        $products = DB::select("SELECT id FROM products WHERE name ='".$request->selected_product."'");
        $productId;
        foreach($products as $product){
            $productId = $product->id;
        }
        $product = Product::FindorFail($productId);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->user_id = $request->user_id;
        $product->save();
        return response('Success',201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function deleteProduct(Request $request){
        $products = DB::select("SELECT id FROM products WHERE name ='".$request->selected_product."'");
        $productId;
        foreach($products as $product){
            $productId = $product->id;
        }
        $product = Product::FindorFail($productId);
        $product->delete();
        return response('Success',201);
    }
}
