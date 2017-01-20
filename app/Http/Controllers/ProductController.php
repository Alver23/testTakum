<?php

namespace App\Http\Controllers;

use App\Category;
use App\Language;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \DB::collection('products')->orderBy('name', 'asc')->get();
        return [
            'products' => $products,
        ];
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
        $product = Product::create($request->all());
        return 'Product record successfully created with id ' . $product->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \DB::collection('products')->where('_id', $id)->first();
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('_id');
        $data = [
            'name' => $request->input('name')
        ];
        $product = Product::find($id)->first();
        $product->name = $request->input('name');
        $product->language = $request->input('language');
        $product->category = $request->input('category');
        $product->save();
        //dd($product);
        return "Sucess updating user";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $products)
    {
        $product = Product::find($products)->first();

        $product->delete();

        return "Product record successfully deleted #" . $request->input('id');
    }
}
