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
        $upload = Upload::get();
        return view('frontend.homepage', ['uploads'=>$upload]);
    }

    public function singleVideo($id){
       $upload = Upload::findOrFail($id);
       $likeCheck = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
        return view('frontend.single_video', compact('upload', "likeCheck"));
    }
}
