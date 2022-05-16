<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ResaerchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RegisterStepTowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home')->with('page_name','Home');
});


Route::group(['middleware'=>['auth']],function ()
{
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
});

Route::group(['middleware'=>['auth','role:author|reviewer']],function ()
{
    //upload research
    Route::get('/research',[ResaerchController::class, 'index'])->name('research');
    Route::post('research\store',[ResaerchController::class,'store'])->name('research_store');
    //tranking Research
    Route::get('trankingResearch',[ResaerchController::class, 'trankingResearch'])->name('trankingResearch');

});


Route::group(['middleware'=>['auth','role:editor']],function ()
{
        //show research and reviewer
        Route::get('SendtoReviewer',[ResaerchController::class, 'show'])->name('SendtoReviewer');

        //send research to review
        Route::post('SendtoReviewer',[ReviewController::class, 'store'])->name('SendtoReview');

        //Promotion Author to Reviewer
        Route::get('AuthortoReviewer',[PromotionController::class, 'index'])->name('ProAuthortoReviewer');
        Route::post('AuthortoReviewer',[PromotionController::class, 'store'])->name('AuthortoReviewer');

        //decision of research
        Route::get('decision',[ResaerchController::class, 'decision'])->name('decision');

        Route::post('accept',[ResaerchController::class, 'accept'])->name('accept');
        Route::post('reject',[ResaerchController::class, 'reject'])->name('reject');

        // traking to reviewer
        Route::get('trankingReviewer',[ResaerchController::class, 'trank'])->name('trankingReviewer');
        //view Feedback
        Route::get('viewfeedback',[FeedbackController::class, 'index'])->name('viewfeedback');
        Route::get('DeleteUser',[DashboardController::class,'viewuser'])->name('DeleteUsers');
        Route::post('DeleteUser',[DashboardController::class, 'delete'])->name('DeleteUser');
});


Route::group(['middleware'=>['auth','role:reviewer']],function ()
{


    //show research to rating
    Route::get('RatingResearch',[RatingController::class, 'index'])->name('RatingResearch');

    //send rating to research
    Route::post('RatingResearch',[RatingController::class, 'store'])->name('SendRatingResearch');

});

//الانتقال الى صفحة المنشورات
Route::get('/postresaerch',[ResaerchController::class, 'postresaerch'])->name('postresaerch');
//الانتقال الى البحث في صفحة المنشورات
Route::get('/search',[ResaerchController::class, 'search'])->name('search');

//download research
Route::get('/download/{file}',[ResaerchController::class,'download'])->name('download');


//send Feedback
Route::post('feedback',[FeedbackController::class, 'store'])->name('feedback');

