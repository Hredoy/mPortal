<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $upload = Upload::whereStatus(1)->get();
        $likeCheck = Like::where('user_id',Auth::id())->first();
        return view('frontend.homepage', ['uploads'=>$upload, "likeChecks"=> $likeCheck]);
    }
    public function music(){
        $upload = Upload::whereStatus(1)->where('category_id', '1')->get();
        // dd($upload);
        return view('frontend.categories.music', ['uploads'=>$upload]);
    }
    public function comedy(){
        $upload = Upload::whereStatus(1)->where('category_id', '2')->get();
        return view('frontend.categories.comedy', ['uploads'=>$upload]);
    }
    public function talent(){
        $upload = Upload::whereStatus(1)->where('category_id', '3')->get();
        return view('frontend.categories.talent', ['uploads'=>$upload]);
    }

    public function singleVideo($id){
       $upload = Upload::findOrFail($id);

       $viewCheck = Upload::where('user_id',Auth::id())->first();
       if (!$viewCheck) {
        $upload->increment('view');
       }
       $likeCheck = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
       $cat_id = $upload->category_id;
	   $relatedUpload = Upload::whereStatus(1)->where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->take(3)->get();
    //    Social Share with jorenvanhocht/laravel-share pack
       $shareButtons = \Share::page(
        \Request::url(),
        $upload->name,
    )
    ->facebook()
    ->twitter()
    ->linkedin()
    ->telegram()
    ->whatsapp()
    ->reddit();

        return view('frontend.single_video', compact('upload', "likeCheck", "relatedUpload", "shareButtons"));
    }
}
