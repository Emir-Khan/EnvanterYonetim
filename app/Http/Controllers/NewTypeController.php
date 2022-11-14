<?php

namespace App\Http\Controllers;

use App\Models\NewType\NewType;
use Illuminate\Http\Request;

class NewTypeController extends Controller
{
    function index(){
        $new_types = NewType::all();
        // printf($new_types);
        return view('front.new_type.main',compact('new_types'));
    }
    function new_type_table_ajax(){
        $new_types = NewType::all();
        $data['new_types'] = $new_types;
        return response()->json($data);
    }
    function create(Request $request){
        $control = NewType::insert([
            'name' => $request->name,
            'detail' => $request->detail,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Tür Ekleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('new_type')->withCookie(cookie('success','Tür Eklendi!',0.02));
        }
    }
    function update(Request $request){
        $control = NewType::where('id',$request->id)
        ->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Tür Güncelleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('new_type')->withCookie(cookie('success','Tür Güncellendi!',0.02));
        }
    }
    function delete(Request $request){
        $control = NewType::where('id',$request->id)->delete();
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Tür Silme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('new_type')->withCookie(cookie('success','Tür Silindi!',0.02));
        }
    }
    function get(Request $request){
        $new_type = NewType::where('id',$request->id)->first();
        return response()->json($new_type);
    }
}
