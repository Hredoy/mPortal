<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function unlike($id)
    {
        Like::where('user_id',Auth::id())->delete();

        return redirect()->back()->with('success', 'succeccfully unliked');
    }
    public function store($id)
    {
        if (Auth::check()) {

            $exists = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
            if (!$exists) {
                Like::create([
                'user_id' => Auth::id(),
                'upload_id' => $id,
                'count' => 1,
            ]);
                return redirect()->back()->with('success', 'succeccfully liked this video.');
            }

        }else{

            return back()->with('error', 'At First Login Your Account');

        }

    }


}
