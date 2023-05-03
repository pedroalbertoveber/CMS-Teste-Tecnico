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

        return view('home')
            ->with('success', 'Categoria cadastrada com sucesso!');

    }

    public function create() {
        return view('categories.create');
    }
}
