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
        return view('frontend.homepage', ['uploads'=>$upload]);
    }
    public function music(){
        $upload = Upload::whereStatus(1)->get();
        return view('frontend.categories.music', ['uploads'=>$upload]);
    }
    public function comedy(){
        $upload = Upload::whereStatus(1)->get();
        return view('frontend.categories.comedy', ['uploads'=>$upload]);
    }
    public function talent(){
        $upload = Upload::whereStatus(1)->get();
        return view('frontend.categories.talent', ['uploads'=>$upload]);
    }

    public function singleVideo($id){
       $upload = Upload::findOrFail($id);
       $likeCheck = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
        return view('frontend.single_video', compact('upload', "likeCheck"));
    }
}
