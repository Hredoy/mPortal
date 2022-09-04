<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Upload;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $input = $request->all();
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = Auth::id();
        Comment::create($input);
        return back();
    }

    public function delComment($id)
    {
       if (Auth::check()) {
        $comment =Comment::findOrFail($id);
        $comment->delete();
        $reply =Comment::where('parent_id',$id)->first();
        if($reply){
            $reply->delete();
        }

        return response()->json([
            'success' => true,
            'code' => 200,

        ]);
       }
    }
    public function getComment($id)
    {
       $comment =Comment::with('user', "replies")->where('upload_id', $id)->get();
       return response()->json([
        'success' => true,
        'code' => 200,
        "data"=> $comment,
        // "replycount"=> $comment->replies->count(),

    ]);
    }

    public function storeComment(Request $request)
    {

        $input = $request->all();
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = Auth::id();
       $comment = Comment::create($input);
        $comment = Comment::with(['user'])->where("id",$comment->id)->first();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $comment
        ]);
    }

}
