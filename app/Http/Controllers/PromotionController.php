<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PromotionController extends Controller
{
    public function index(){
        $Author = User::whereRoleIs('author')->get();
        return view('editor.PromotiontoReviewer',compact('Author'))->with('page_name','PromotiontoReviewer');
    }
    public function store(Request $request){
        $Author=DB::update('update role_user set role_id = ? where user_id = ?', ['2',$request->id]);
        return redirect()->back()->withErrors('تم ترقية الباحث الى محكم بنجاح.');
    }
}
