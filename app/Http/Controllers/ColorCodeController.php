<?php

namespace App\Http\Controllers;

use App\Models\ColorCode\ColorCode;
use Illuminate\Http\Request;

class ColorCodeController extends Controller
{
    function index(){
        $color_codes = ColorCode::all();
        // printf($color_codes);
        return view('front.color_code.main',compact('color_codes'));
    }
    function color_code_table_ajax(){
        $color_codes = ColorCode::all();
        $data['color_codes'] = $color_codes;
        return response()->json($data);
    }
    function create(Request $request){
        $control = ColorCode::insert([
            'name' => $request->name,
            'detail' => $request->detail,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Renk Kodu Ekleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('color_code')->withCookie(cookie('success','Renk Kodu Eklendi!',0.02));
        }
    }
    function update(Request $request){
        $control = ColorCode::where('id',$request->id)
        ->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Renk Kodu Güncelleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('color_code')->withCookie(cookie('success','Renk Kodu Güncellendi!',0.02));
        }
    }
    function delete(Request $request){
        $control = ColorCode::where('id',$request->id)->delete();
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Renk Kodu Silme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('color_code')->withCookie(cookie('success','Renk Kodu Silindi!',0.02));
        }
    }
    function get(Request $request){
        $color_code = ColorCode::where('id',$request->id)->first();
        return response()->json($color_code);
    }
}
