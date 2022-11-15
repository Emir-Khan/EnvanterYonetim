<?php

namespace App\Models\NewType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewTypeOwner extends Model
{
    use HasFactory;

    protected $table = "new_type_owners";

    public function getInfo(){
        return $this->hasOne('App\Models\NewType\NewType','id','new_type_id');
    }
}
