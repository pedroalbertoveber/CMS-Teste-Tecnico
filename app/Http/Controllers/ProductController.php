<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

  public function index() {
    $products = Product::all();

    return view('products.index')
      ->with('products', $products);
  }

  public function store(ProductFormRequest $request) {
    $product = DB::transaction(function () use ($request) {
      $data = $request->except(['_token']);

      // transforming data to lowercase
      $data['name'] = strtolower($data['name']);
      $data['brand'] = strtolower($data['brand']);

      $newProduct = Product::create([
        'name' => $data['name'],
        'price' => $data['price'],
        'brand' => $data['brand'],
        'description' => $data['description']
      ]);

      return $newProduct;
    });


    foreach($request['categories'] as $category) {
      $product->categories()->attach($category);
    }

    return view('home');
  }
  
  public function create() {
      $categories = Category::all();

      return view('products.create')
        ->with('categories', $categories);
  }

  public function edit($productId) {
    $product = Product::findOrFail($productId);
    $categories = Category::all();

    $productCategories = [];

    foreach ($product->categories->toArray() as $category)
    {
      $productCategories[] = $category['name'];
    }

    return view('products.edit', [
      'product' => $product,
      'categories' => $categories,
      'productCategories' => $productCategories,
    ]);
  }

  public function destroy($productId) {
    $product = Product::findOrFail($productId);

    $product->delete();

    return to_route('products.index');
  }
}
