<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Image;
use \App\Category;
use \App\Subcategory;
use \App\Brand;
use \App\Provider;

class ProductsController extends Controller
{
  // // buscar productos
  // public function searchProducts(Request $request) {
  //   $products = Product::where('title', 'like', '%' . $request->input('search') . '%')->get();
  //   foreach ($products as $product) {
  //     $product->marcas = "";
  //     foreach ($product->brands as $key => $brand) {
  //       if ( $key === 0 ) {
  //         $product->marcas .= $brand->name;
  //       } else {
  //         $product->marcas .= ", " . $brand->name;
  //       }
  //     }
  //   }
  //   $param = [
  //     'products' => $products
  //   ];
  //   return view('products.list', $param);
  // }

  // listar productos
  public function listProducts() {
    $products = Product::orderBy('title', 'asc')->get();
    foreach ($products as $product) {
      $product->marcas = "";
      foreach ($product->brands as $key => $brand) {
        if ( $key === 0 ) {
          $product->marcas .= $brand->name;
        } else {
          $product->marcas .= ", " . $brand->name;
        }
      }
    }
    $param = [
      'products' => $products
    ];
    return view('products.list', $param);
  }

  // listar productos por
  public function listProductsBy($param, $order)
  {
    $products = Product::orderBy($param, $order)->get();
    foreach ($products as $product) {
      $product->marcas = "";
      foreach ($product->brands as $key => $brand) {
        if ( $key === 0 ) {
          $product->marcas .= $brand->name;
        } else {
          $product->marcas .= ", " . $brand->name;
        }
      }
    }
    $param = [
      'products' => $products
    ];
    return view('products.list', $param);
  }

  // ficha productos
  public function productDescription($code) {
    $categories = Category::orderBy('name', 'asc')->get();
    $product = Product::where("code", "=", $code)->first();
    if ($product == []) {
      return redirect('/error404');
    }
    $product->marcas = "";
    foreach ($product->brands as $key => $brand) {
      if ( $key === 0 ) {
        $product->marcas .= $brand->name;
      } else {
        $product->marcas .= ", " . $brand->name;
      }
    }

    $param = [
      'product' => $product,
      'categories' => $categories
    ];
    return view('frontdesk.product', $param);
  }

  // listado productos por subcategoria - desde el menu de home
  public function productBySubcategory($categorySlug, $subcategorySlug) {
    $subcategory = Subcategory::where('slug', '=', $subcategorySlug)->first();
    $categories = Category::orderBy('name', 'asc')->get();
    $subcategories = Subcategory::orderBy('name', 'asc')->get();
    $productsCount = $subcategory->products->count();
    $brands = Brand::orderBy('name')->get();
    $param = [
      'subcategory' => $subcategory,
      'categories' => $categories,
      'subcategories' => $subcategories,
      'productsCount' => $productsCount,
      'brands' => $brands
    ];
    return view('frontdesk.productList', $param);
  }

  // crear productos
  public function createProduct()
  {
    $categories = Category::orderBy('name', 'asc')->get();
    $subcategories = Subcategory::orderBy('name', 'asc')->get();
    $brands = Brand::orderBy('name', 'asc')->get();
    $providers = Provider::orderBy('name', 'desc')->get();
    $param = [
      'categories' => $categories,
      'subcategories' => $subcategories,
      'brands' => $brands,
      'providers' => $providers
    ];
    return view('products.create', $param);
  }

  // subida de multiphoto
  public function multiPhoto(Request $request, $product) {
    $images = $request->file('altImg');
    foreach($images as $key => $value) {
      $image = $this->uploadPhoto($value, $product);
    }
  }
  public function uploadPhoto($image, $product) {
    $extension = $image->getClientOriginalExtension();
    $path = $image->storeAs("/product_img", uniqid() . "."  . $extension, 'public');
    $image = Image::create([
      'path' => $path
    ]);

    $image->product()->associate($product);
    $image->save();

    return $image;
  }

  // guardar producto
  public function storeProduct(Request $request) {
    $rules = [
      'title' => 'required',
      'code' => 'required',
      'brands' => 'required',
      'subcategory' => 'required',
      'primary_img' => 'image|mimes:jpg,png',
    ];
    $messages = [
      'required' => 'el campo es obligatorio',
      'numeric' => 'el campo debe ser numérico',
    ];

    $request->validate($rules, $messages);

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs("/product_img", uniqid() . "."  . $extension, 'public');
    } else {
      $path = "";
    }

    $product = Product::create([
      'title' => $request->input('title'),
      'code' => $request->input('code'),
      'stock' => $request->input('stock'),
      'description' => $request->input('description'),
      'price' => $request->input('price'),
      "primary_img" => $path
    ]);

    if (count($request->file('altImg')) > 0) {
      $this->multiPhoto($request, $product);
    }
    $product->brands()->sync($request->input('brands'));
    $product->providers()->sync($request->input('providers'));
    $product->subcategory()->associate($request->input('subcategory'));
    $product->save();
    return redirect('/admin/productos');
  }

  // editar producto
  public function editProduct($id)
  {
    $product = Product::find($id);
    $subcategories = Subcategory::orderBy('name', 'asc')->get();
    $subcategoria = $product->subcategory;
    $brands = Brand::orderBy('name', 'asc')->get();
    $marcas = $product->brands;
    $providers = Provider::orderBy('name', 'desc')->get();
    $proveedores = $product->providers;
    $param = [
      'product' => $product,
      'subcategories' => $subcategories,
      'subcategoria' => $subcategoria,
      'brands' => $brands,
      'marcas' => $marcas,
      'providers' => $providers,
      'proveedores' => $proveedores
    ];
    return view('products.edit', $param);
  }

  // guardar producto editado
  public function updateProduct(Request $request, $id)
  {
    $product = Product::find($id);
    $product->title = $request->input('title');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->code = $request->input('code');
    $product->stock = $request->input('stock');

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs('/product_img', uniqid() . "."  . $extension, 'public');
      $product->primary_img = $path;
    } else {
      $product->primary_img = $product->primary_img;
    }
    if (count($request->file('altImg')) > 0) {
      $this->multiPhoto($request, $id);
    }

    $product->brands()->sync($request->input('brands'));
    $product->providers()->sync($request->input('providers'));
    $product->subcategory()->associate($request->input('subcategory'));
    $product->save();

    return redirect('/admin/productos');
  }

  // eliminar producto
  public function destroyProduct($id)
  {
    $product = Product::find($id);
    $product->subcategory()->dissociate();
    $product->brands()->detach();
    $product->providers()->detach();
    foreach($product->images as $image) {
      $image->product_id = null;
      $image->save();
    }
    $product->delete();
    return redirect('/admin/productos');
  }
}
