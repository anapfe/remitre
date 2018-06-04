<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $fillable = [
        'title', 'description', 'price', 'code', 'stock', 'subcategory_id', 'primary_img'
      ];

      public function subcategory() {
        return $this->belongsTo('\App\Subcategory');
      }

      public function brands() {
        return $this->belongsToMany('\App\Brand', 'brand_product', 'product_id', 'brand_id');
      }

      public function providers() {
        return $this->belongsToMany('\App\Provider', 'product_provider', 'product_id', 'provider_id');
      }

      public function images() {
        return $this->hasMany('\App\Image', 'product_id', 'id');
      }
}
