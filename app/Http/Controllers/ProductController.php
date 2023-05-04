<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function index(Request $request) {

    $search = $request->query('query');

    if ($search && $search !== '') {
      $products = Product::where('name', 'LIKE', '%'.strtolower($search).'%')->get();

      return view('products.index',['products' => $products, 'search' => $search]);
    }

    $products = Product::all();
    return view('products.index',['products' => $products]);
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

    $product->categories()->attach($request['categories']);

    return to_route('products.index');
  }
  
  public function create() {
      $categories = Category::all();

      if (count($categories) === 0) {
        return to_route('categories.create');
      }

      return view('products.create')
        ->with('categories', $categories);
  }

  public function update($productId, ProductFormRequest $request) {
    $product = DB::transaction(function () use ($productId, $request) {
      $selectedProduct = Product::findOrFail($productId);

      $data = $request->except(['_token']);

      $selectedProduct->name = $data['name'];
      $selectedProduct->price = $data['price'];
      $selectedProduct->description = $data['description'];
      $selectedProduct->brand = $data['brand'];

      $selectedProduct->update();

      return $selectedProduct;
    });

    foreach($request['categories'] as $category) {
      $product->categories()->sync($category);
    }

    return to_route('products.index');
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
 