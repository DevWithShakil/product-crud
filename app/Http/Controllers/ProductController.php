<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = DB::table('products')->paginate(5);
        return view('product.index', compact('products'));
    }

    // Show create product form
    public function create()
    {
        return view('product.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        DB::table('products')->insert([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/products')->with('success', 'Product created successfully');
    }

    // Show single product
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.show', compact('product'));
    }

    // Show edit product form
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => "required|unique:products,product_id,$id",
            'name' => 'required',
            'price' => 'required',
        ]);

        DB::table('products')->where('id', $id)->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'updated_at' => now(),
        ]);

        return redirect('/products')->with('success', 'Product updated successfully');
    }

    // Delete product
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');
    }
}
