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
       if (Auth::check()) {
            $input['user_id'] = Auth::id();
            $input['created_at'] = \Carbon\Carbon::now();
            $id = Comment::insertGetId($input);

            if ($request->parent_id) {
                $comment=  Comment::whereParent_id($request->parent_id)->with("user")->first();
            } else {
                $comment=  Comment::whereId($id)->with("user")->first();
            }

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'data' => [
                        "comment"=>$comment,
                        "time"=>$comment->created_at->diffForHumans(),
                        "userName"=>$comment->user->name,
                        ]
                ]);


       }
    }

}
