<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['name'];

  public function products() {
    return $this->hasMany('\App\Product', 'category_id', 'id');
  }
  public function subcategories() {
    return $this->hasMany('\App\Subcategory', 'category_id', 'id');
  }
}
