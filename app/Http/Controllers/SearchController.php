<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Category;
use \App\Subcategory;
use \App\Brand;

class SearchController extends Controller
{
  public function search() {
    $keywordsRaw = \Request::get('search');
    $keywords = explode(' ', $keywordsRaw);
    $products = Product::where( function ($q) use ($keywords) {
      if (count($keywords) == 1) {
        foreach ($keywords as $keyword) {
          if ( is_numeric($keyword) ) {
            $q->where('code', 'like', '%' . $keyword . '%');
          } else {
            $q->where('title', 'like', '%' . $keyword . '%')
            ->orWhereHas('subcategory', function ($query) use ($keyword) {
              $query->where('name', 'like', "%" . $keyword . "%");
            })
            ->orWhereHas('brands', function ($query) use ($keyword) {
              $query->where('name', 'like', '%' . $keyword . '%');
            });
          }
        }
      } else if ( count($keywords) == 2 ) {
        $q->where( function ($s) use ($keywords) {
          $s->where('title', 'like', '%' . $keywords[0] . '%')
          ->orWhereHas('brands', function($t) use ($keywords) {
            $t->where('name', 'like', '%' . $keywords[0] . '%');
          })
          ->orWhereHas('subcategory', function($t) use ($keywords) {
            $t->where('name', 'like', '%' . $keywords[0] . '%');
          });
        })->where( function ($u) use ($keywords) {
          $u->where('title', 'like', '%' . $keywords[1] . '%')
          ->orWhereHAS('brands', function($t) use ($keywords) {
            $t->where('name', 'like', '%' . $keywords[1] . '%');
          })
          ->orWhereHas('subcategory', function($t) use ($keywords) {
            $t->where('name', 'like', '%' . $keywords[1] . '%');
          });
        });
      };
    })->orderBy('title')->get();

    $productsCount = $products->count();
    $brands = Brand::orderBy('name')->get();
    $categories = Category::orderBy('name', 'asc')->get();
    $subcategory = Subcategory::orderBy('name', 'asc')->get();
    $param = [
      'products' => $products,
      'productsCount' => $productsCount,
      'keywordsRaw' => $keywordsRaw,
      'brands' => $brands,
      'categories' => $categories,
      'subcategory' => $subcategory
    ];
    return view('frontdesk.search', $param);
  }
}
