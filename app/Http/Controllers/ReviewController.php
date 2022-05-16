<?php

namespace App\Http\Controllers;

use App\Models\research;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->author_id==$request->select_Reviewer)
        {
            return redirect()->back()->withErrors(['لا يمكنك إرسال البحث الى نفس الكاتب.']);
        }
        else{

            research::where('id',"$request->research_select")
            ->update(['status_research' => 'in review']);

            review::where('research_id',$request->research_select)
            ->update(['reviewer_id' => $request->select_Reviewer]);

            return redirect()->back()->withErrors(['تم إرسال البحث بنجاح.']);
        }
    }
}
