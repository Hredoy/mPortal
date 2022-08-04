<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.homepage');
    }

    public function singleVideo($id){
       $upload = Upload::findOrFail($id);
       $comments = Comment::whereUpload_id($id)->get();
        return view('frontend.single_video', compact('upload', "comments"));
    }
}
