<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index',compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->only(['name']));

        return redirect(route('category.index'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request,$id)
    {
        Category::find($id)->update($request->only(['name']));

        return redirect(route('category.index'));
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        
        return redirect(route('category.index'));
    }
}
