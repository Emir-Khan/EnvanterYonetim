<?php

namespace App\Models\Status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOwner extends Model
{
    use HasFactory;

    protected $table = "status_owners";

    public function getInfo(){
        return $this->hasOne('App\Models\Status\Status','id','status_id');
    }
}
