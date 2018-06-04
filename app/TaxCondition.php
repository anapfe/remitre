<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxCondition extends Model
{
    protected $fillable = [
      'name', 'iva', 'discount'
    ];

    public function providers() {
      return $this->hasMany('\App\Provider', 'tax_condition_id', 'id');
    }
}
