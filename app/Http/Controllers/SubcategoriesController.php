<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Subcategory;
use \App\Category;

class SubcategoriesController extends Controller
{
  public function listSubcategories() {
    $subcategories = Subcategory::orderBy('name', 'asc')->get();
    $param = [
      'subcategories' => $subcategories
    ];
    return view('subcategories.list', $param);
  }

  public function createSubcategory()
  {
    $categories = Subcategory::orderBy('name', 'asc')->get();
    $param = [
      'categories' => $categories
    ];
    return view('subcategories.create', $param);
  }

  public function storeSubcategory(Request $request)
  {
    $rules = [
      "name" => 'required|unique:subcategories',
      'category' => 'required'
    ];
    $messages = [
      "required" => 'el campo es requerido',
      'unique' => 'ya existe una subcategoria con ese nombre'
    ];
    $request->validate($rules, $messages);
    $subcategory = Subcategory::create([
      "name" => $request->input('name'),
      'category_id' => $request->input('category')
    ]);
    $subcategory->category()->associate($subcategory);
    return redirect('/admin/subcategorias');
  }

  public function editSubcategory($id)
  {
    $subcategory = Subcategory::find($id);
    $param = [
      'subcategory' => $subcategory
    ];
    return view('subcategories.edit', $param);
  }

  public function updateSubcategory(Request $request, $id)
  {
    $subcategory = Subcategory::find($id);
    $subcategory->name = $request->input('name');
    // $subcategory->category = $request->input('category');
    $subcategory->category()->associate($subcategory);
    $subcategory->save();

    return redirect('/admin/subcategorias');
  }

  public function destroySubcategory($id)
  {
    $subcategory = Subcategory::find($id);
    $subcategory->category()->dissociate($subcategory);
    $subcategory->products()->sync([]);
    $subcategory->delete();
    return redirect('/admin/subcategories');
  }
}
