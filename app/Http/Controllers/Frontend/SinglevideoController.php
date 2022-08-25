<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinglevideoController extends Controller
{
    public function like($id)
    {

        // return 'like function';


        if (Auth::check()) {
            $exists = Like::where('user_id', Auth::id())->where('upload_id', $id)->first();
            if (!$exists) {
                Like::create([
                    'user_id' => Auth::id(),
                    'upload_id' => $id,
                    'count' => 1,
                ]);

                $like = Like::where('upload_id', $id)->count();

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'data' => [
                        'likecount'=>$like,
                        'click'=> 'like'
                    ]
                ]);
            }elseif($exists){
                Like::where('user_id', Auth::id())->where('upload_id', $id)->delete();
                $like = Like::where('upload_id', $id)->count();
                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'data' => [
                        'likecount'=>$like,
                        'click'=> 'unlike'
                    ]
                ]);
            }
        } else {
            return response()->json([
                'success' => true,
                'code' => 401
            ]);
        }
    }
}
