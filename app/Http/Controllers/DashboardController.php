<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('author'))
        {
            return view('dashboard.authordashboard')->with('page_name','Dashboard');
        }elseif (Auth::user()->hasRole('reviewer'))
        {
            return view('dashboard.reviewerdashboard')->with('page_name','Dashboard');
        }elseif (Auth::user()->hasRole('editor'))
        {
            return view('dashboard.editordashboard')->with('page_name','Dashboard');
        }
    }

    public function viewuser()
    {
        $User=User::all();
        return view('editor.deleteuser',compact('User'));
    }
    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        return redirect()->back()->withErrors(['تم حذف العضو بنجاح.']);
    }

}
