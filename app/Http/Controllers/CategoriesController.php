<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;

class CategoriesController extends Controller
{
  public function listCategories()
  {
    $categories = Category::orderBy('name', 'asc')->get();
    $param = [
      'categories' => $categories
    ];
    return view('categories.list', $param);
  }

  public function createCategory()
  {
    return view('categories.create');
  }

  public function storeCategory(Request $request)
  {
    $rules = [
      "name" => 'required|unique:categories',
    ];
    $messages = [
      "required" => 'El campo es requerido',
      'unique' => 'La categoría ya existe'
    ];
    $request->validate($rules, $messages);
    $category = Category::create([
      "name" => $request->input('name')
    ]);
    return redirect('/categorias');
  }

  public function editCategory($id)
  {
    $category = Category::find($id);
    $param = [
      'category' => $category
    ];
    return view('categories.edit', $param);
  }

  public function updateCategory(Request $request, $id)
  {
    $category = Category::find($id);
    $category->title = $request->input('name');
    $category->save();
  }

  public function destroyCategory($id)
  {
    $category = Category::find($id);
    $category->products()->sync([]);
    $category->delete();
    return redirect('/categories');
  }
}
