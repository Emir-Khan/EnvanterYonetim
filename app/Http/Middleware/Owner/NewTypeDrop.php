<?php

namespace App\Http\Middleware\Owner;

use App\Models\NewType\NewTypeOwner;
use Closure;
use Illuminate\Http\Request;

class NewTypeDrop
{
    public function handle(Request $request, Closure $next)
    {
        $control    =   NewTypeOwner::where('new_type_id',$request->new_type_id)->where('owner_id',$request->user_id)->first();
        if($control==NULL){
            return redirect()->back()->withCookie(cookie('error','Tür Teslim İşlemi Sırasında Hata Oluştu!',0.02));
        }
        return $next($request);
    }
}
