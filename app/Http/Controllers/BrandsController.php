<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Brand;

class BrandsController extends Controller
{
  public function listBrands()
  {
    $brands = Brand::orderBy('name', 'asc')->get();
    $param = [
      'brands' => $brands
    ];
    return view('brands.list', $param);
  }

  public function createBrand()
  {
    return view('brands.create');
  }

  public function storeBrand(Request $request)
  {
    $rules = [
      "name" => 'required|unique:categories',
    ];
    $messages = [
      "required" => 'el campo es requerido',
      'unique' => 'ya existe una categoria con ese nombre'
    ];
    $request->validate($rules, $messages);
    $brand = Brand::create([
      "name" => $request->input('name')
    ]);
    // $brand->products()->sync($request->input('products'));
    $brand->save();
    return redirect('/admin/marcas');
  }

  public function editBrand($id) {
    $brand = Brand::find($id);
    $param = [
      'brand' => $brand
    ];
    return view('brands.edit', $param);
  }

  public function updateBrand(Request $request, $id) {
    $brand = Brand::find($id);
    $brand->name = $request->input('name');
    $brand->save();

    return redirect('/admin/marcas');
  }

  public function destroyBrand($id) {
    $brand = Brand::find($id);
    $brand->product()->detach();
    $brand->delete();
    return redirect('/admin/marcas');
  }
}
