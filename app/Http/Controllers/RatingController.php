<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\research;
use App\Models\review;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = research::join('reviews','reviews.research_id', '=', 'research.id')
        ->where('status_research','=',"in review")
        ->where('reviewer_id', '=', [Auth::user()->id])
        ->select('research.*')
        ->get();

        // dd($research);
        return view('reviewer.rating',compact('research'))->with('page_name','Rating');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // validation on file upload
        $validated = $request->validate([
            'file' => 'mimes:pdf',
        ]);

    // create new rate for research
        $Rating=new rating();
        if(isset($request->file))
        {
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/suggest of Rating',$filename);
            $Rating->suggest=$filename;
        }
        $Rating->decision=$request->submit;
        $Rating->research_id=$request->id;
        $Rating->save();

    // get review from table and assing rating id to it
        review::where('research_id',$request->id)
        ->update(['rating_id' => $Rating->id]);
    // change research state from research table
        research::where('id',"$request->id")
        ->update(['status_research' => 'reviewed']);

    // get back to same page with successfull message
        return redirect()->back()->withErrors(['تم إرسال تقييم البحث بنجاح.']);
    }
}
