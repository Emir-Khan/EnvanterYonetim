<?php

namespace App\Models\ProductType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeOwner extends Model
{
    use HasFactory;

    protected $table = "product_type_owners";

    public function getInfo(){
        return $this->hasOne('App\Models\ProductType\ProductType','id','product_type_id');
    }
}
