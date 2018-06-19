<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Product;
use \App\Subcategory;
use \App\Brand;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct() {
    // $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $categories = Category::orderBy('name', 'asc')->get();
    $products = Product::all();
    $newProducts = Product::orderBy('created_at', 'desc')->take(16)->get();
    $param = [
      'products' => $products,
      'categories' => $categories,
      'newProducts' => $newProducts
    ];
    return view('index', $param);
  }

  public function indexAdmin() {
    return view('indexAdmin');
  }

  public function store() {
    $products = Product::all();
    $param = [
      'products' => $products
    ];
    return view('store', $param);
  }

}
