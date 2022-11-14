<?php

namespace App\Models\ColorCode;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorCodeOwner extends Model
{
    use HasFactory;

    protected $table = "color_code_owners";

    public function getInfo(){
        return $this->hasOne('App\Models\ColorCode\ColorCode','id','color_code_id');
    }
}
