<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\research;
use App\Models\review;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ResaerchController extends Controller
{
    public function accept(Request $request){
        research::where('id', $request->id)
        ->update(['status_research' => 'post']);
        return redirect()->back()->withErrors(['تم نشر البحث بنجاح.']);
    }

    public function reject(Request $request){
        research::where('id', $request->id)
        ->update(['status_research' => 'reject']);
        return redirect()->back()->withErrors(['تم رفض البحث بنجاح.']);
    }

    public function decision(Request $request){

        $review = review::join('research','research.id', '=', 'reviews.research_id')
            ->join('ratings','ratings.id', '=', 'reviews.rating_id')
            ->join('users','users.id', '=', 'reviews.reviewer_id')
            ->where('status_research','=',"reviewed")
            ->select('users.name','research.id','research.research_title','research.abstract','ratings.decision','ratings.suggest')
            ->get();

        return view('editor.decision',compact('review'))->with('page_name','Decision');
    }
    // البحث في المنشورات
    public function search(Request $request){
        $saerch_text=$request->get('query');
        $post=research::where('research_title','like','%'.$saerch_text.'%')
        ->where('status_research','post')
        ->get();
        return view('resaerch.saerch',compact('post'))->with('page_name','Search');
    }
    //tranking to Reviewer
    public function trank(Request $request){
        $review=research::all();
        return view('editor.trankingtoReviewer',compact('review'))->with('page_name','Tranking');
    }
    //tranking to Research
    public function trankingResearch(Request $request){
        $research = review::join('research','research.id', '=', 'reviews.research_id')
            ->join('ratings','ratings.id', '=', 'reviews.rating_id')
            ->where('author_id','=',[Auth::user()->id])
            ->select('research.research_title','research.abstract','research.type_research','research.research_field','research.status_research','ratings.suggest','research.address_file')
            ->get();

        return view('resaerch.trankingResearch',compact('research'))->with('page_name','Tranking');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return uplode research page
        return view('author.uplode')->with('page_name','Uplode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'address_file' => 'File:docx,pdf|required',
            'address_img' => 'Mimes:jpeg,jpg,png,jfif|required|max:10000',
            'type_research' => ['required', 'string', 'nullable'],
        ])->validate();


        // save File in database and storge file
        $file=$request->file('address_file');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/research',$filename);

        // save Image in database and storge Image
        $IMG_File=$request->file('address_img');
        $IMG_filename=time().'.'.$IMG_File->getClientOriginalExtension();
        $IMG_File->storeAs('public/images research',$IMG_filename);

        $research=new research();
        $research->research_title=$request->research_title;
        $research->address_file =$filename;
        $research->type_research=$request->type_research;
        $research->abstract=$request->abstract;
        $research->research_field=$request->research_field;
        $research->address_img=$IMG_filename;
        $research->save();

        // save data for review table
        $reviwe=new review();
        $reviwe->author_id=Auth::user()->id;
        $reviwe->research_id=$research->id;
        $reviwe->rating_id='1';
        $reviwe->save();
        return redirect()->back()->withErrors(['تم إرسال البحث بنجاح.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // select information research in database
        $research = review::join('research','research.id', '=', 'reviews.research_id')
        ->join('ratings','ratings.id', '=', 'reviews.rating_id')
        ->where('status_research','=','new')
        ->select('reviews.author_id','research.id','research.research_title','research.abstract','research.type_research','research.research_field','research.address_file')
        ->get();

        // select information Reviewer in database
        $Reviewer=User::join('role_user','users.id',"=",'role_user.user_id')
        ->where('role_id','2')
        ->select('users.id','users.name','users.degree','users.Institution','users.email')
        ->get();

        return view('editor.SendtoReviewer',compact('research','Reviewer'));
    }

    public function download(Request $request)
    {
        if(Storage::disk('public')->exists("research/$request->file"))
        {
            $path=Storage::disk('public')->path("research/$request->file");
            $content=file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }elseif(Storage::disk('public')->exists("suggest of Rating/$request->file"))
        {
            $path=Storage::disk('public')->path("suggest of Rating/$request->file");
            $content=file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
