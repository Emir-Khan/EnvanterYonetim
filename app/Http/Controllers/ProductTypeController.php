<?php

namespace App\Http\Controllers;

use App\Models\ProductType\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    function index(){
        $product_types = ProductType::all();
        // printf($product_types);
        return view('front.product_type.main',compact('product_types'));
    }
    function product_type_table_ajax(){
        $product_types = ProductType::all();
        $data['product_types'] = $product_types;
        return response()->json($data);
    }
    function create(Request $request){
        $control = ProductType::insert([
            'name' => $request->name,
            'detail' => $request->detail,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Ürün Türü Ekleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('product_type')->withCookie(cookie('success','Ürün Türü Eklendi!',0.02));
        }
    }
    function update(Request $request){
        $control = ProductType::where('id',$request->id)
        ->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Ürün Türü Güncelleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('product_type')->withCookie(cookie('success','Ürün Türü Güncellendi!',0.02));
        }
    }
    function delete(Request $request){
        $control = ProductType::where('id',$request->id)->delete();
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Ürün Türü Silme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('product_type')->withCookie(cookie('success','Ürün Türü Silindi!',0.02));
        }
    }
    function get(Request $request){
        $product_type = ProductType::where('id',$request->id)->first();
        return response()->json($product_type);
    }
}
