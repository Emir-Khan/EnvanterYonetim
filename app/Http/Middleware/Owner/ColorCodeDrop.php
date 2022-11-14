<?php

namespace App\Http\Middleware\Owner;

use App\Models\ColorCode\ColorCodeOwner;
use Closure;
use Illuminate\Http\Request;

class ColorCodeDrop
{
    public function handle(Request $request, Closure $next)
    {
        $control    =   ColorCodeOwner::where('color_code_id',$request->color_code_id)->where('owner_id',$request->user_id)->first();
        if($control==NULL){
            return redirect()->back()->withCookie(cookie('error','Renk Kodu Teslim İşlemi Sırasında Hata Oluştu!',0.02));
        }
        return $next($request);
    }
}
