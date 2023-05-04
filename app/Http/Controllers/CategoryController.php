<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(CategoryFormRequest $request) {

        DB::transaction(function () use ($request) {
            $data = $request->except(['_token']);

            //transforming name to lowercase
            $data['name'] = strtolower($data['name']);

            $category = Category::create([
                'name' => $data['name'],
            ]);

            return $category;
        });

        return to_route('categories.index')
            ->with('success', 'Categoria cadastrada com sucesso!');

    }

    public function edit($categoryId) {
        $category = Category::findOrFail($categoryId);

        return view('categories.edit')
            ->with('category', $category);
    }

    public function update($categoryId, CategoryFormRequest $request) {
        DB::transaction(function () use ($categoryId, $request) {
            $data = $request->except(['_token']);

            $category = Category::findOrFail($categoryId);

            $category->name = $data['name'];
            $category->update();

            return $category;
        });

        return to_route('categories.index');
    }

    public function destroy($categoryId) {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return to_route('categories.index');
    }

    public function create() {
        return view('categories.create');
    }

    public function index() {
        $categories = Category::all();

        return view('categories.index')
            ->with('categories', $categories);
    }
}
