<?php

namespace App\Http\Middleware\Owner;

use App\Models\Status\StatusOwner;
use Closure;
use Illuminate\Http\Request;

class StatusDrop
{
    public function handle(Request $request, Closure $next)
    {
        $control    =   StatusOwner::where('status_id',$request->status_id)->where('owner_id',$request->user_id)->first();
        if($control==NULL){
            return redirect()->back()->withCookie(cookie('error','Durum Teslim İşlemi Sırasında Hata Oluştu!',0.02));
        }
        return $next($request);
    }
}
