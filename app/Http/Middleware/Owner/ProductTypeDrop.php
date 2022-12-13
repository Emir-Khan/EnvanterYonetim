<?php

namespace App\Http\Middleware\Owner;

use App\Models\ProductType\ProductTypeOwner;
use Closure;
use Illuminate\Http\Request;

class ProductTypeDrop
{
    public function handle(Request $request, Closure $next)
    {
        $control    =   ProductTypeOwner::where('product_type_id',$request->product_type_id)->where('owner_id',$request->user_id)->first();
        if($control==NULL){
            return redirect()->back()->withCookie(cookie('error','Ürün Türü Teslim İşlemi Sırasında Hata Oluştu!',0.02));
        }
        return $next($request);
    }
}
