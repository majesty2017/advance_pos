<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.products.index');
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
        $v = Validator::make($request->all(), [
           'product_name' => 'required|string|max:255|unique:products',
            'cost_price' => 'required|string|max:255',
            'selling_price' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        if ($v->fails()) {
            return response()->json(['status' => 'fail', 'error' => $v->errors()]);
        }
        $product = new Product();
        $product->product_id = mt_rand(10, 1000000000000000);
        $product->product_name = $request->product_name;
        $product->cost_price = $request->cost_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->alert_stock = $request->stock;
        $product->brand = $request->brand;
        $product->description = $request->description;
        if ($product->save()) {
            return response()->json(['message' => 'Product saved successfully', 'data' => $product], 201);
        }
        return response()->json(['error' => 'Failed'], 500);
    }

    /** get all products from the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function products()
    {
        $product = Product::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::where('id', $product->id)->first();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $v = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'cost_price' => 'required|string|max:255',
            'selling_price' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        if ($v->fails()) {
            return response()->json(['status' => 'fail', 'error' => $v->errors()]);
        }
        $product = Product::find($product->product_id);
        $product->product_id = mt_rand(10, 1000000000000000);
        $product->product_name = $request->product_name;
        $product->cost_price = $request->cost_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->alert_stock = $request->stock;
        $product->brand = $request->brand;
        $product->description = $request->description;
        if ($product->update()) {
            return response()->json(['message' => 'Changes saved successfully', 'data' => $product]);
        }
        return response()->json(['error' => 'Failed'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product->product_id);
        if ($product->delete()) {
            return response()->json(['message' => 'Product deleted successfully', 'data' => $product]);
        }
        return response()->json(['error' => 'Failed'], 500);
    }
}
