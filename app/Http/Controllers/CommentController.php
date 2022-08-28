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

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->upload_id = $request->upload_id;

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $upload = Upload::find($request->upload_id);

        $upload->comments()->save($reply);

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

}
