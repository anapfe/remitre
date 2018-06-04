<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
      'name', 'address', 'cp', 'phone', 'email', 'cuit', 'open', 'tax_condition_id'
    ];

    public function products() {
      return $this->belongsToMany('\App\Product', 'product_provider', 'product_id', 'provider_id');
    }

    public function tax_condition() {
      return $this->belongsTo('\App\TaxCondition');
    }

}
