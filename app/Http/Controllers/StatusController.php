<?php

namespace App\Http\Controllers;

use App\Models\Status\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    function index(){
        $status = Status::all();
        // printf($status);
        return view('front.status.main',compact('status'));
    }
    function status_table_ajax(){
        $status = Status::all();
        $data['status'] = $status;
        return response()->json($data);
    }
    function create(Request $request){
        $control = Status::insert([
            'name' => $request->name,
            'detail' => $request->detail,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Durum Ekleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('status')->withCookie(cookie('success','Durum Eklendi!',0.02));
        }
    }
    function update(Request $request){
        $control = Status::where('id',$request->id)
        ->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'updated_at' => now()
        ]);
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Durum Güncelleme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('status')->withCookie(cookie('success','Durum Güncellendi!',0.02));
        }
    }
    function delete(Request $request){
        $control = Status::where('id',$request->id)->delete();
        if($control <= 0){
            return redirect()->back()->withCookie(cookie('error','Durum Silme İşlemi Sırasında Bir Hata Meydana Geldi!',0.02));
        }
        else{
            return redirect()->route('status')->withCookie(cookie('success','Durum Silindi!',0.02));
        }
    }
    function get(Request $request){
        $status = Status::where('id',$request->id)->first();
        return response()->json($status);
    }
}
