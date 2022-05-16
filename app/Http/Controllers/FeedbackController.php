<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback=Feedback::all();

        return view('editor.FeedBack', compact('feedback'))->with('page_name','Feedback');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $feedback=new Feedback();
        $feedback->name=$request->name;
        $feedback->email=$request->email;
        $feedback->message=$request->msgContent;
        $feedback->save();

        return redirect()->back();
    }
}
