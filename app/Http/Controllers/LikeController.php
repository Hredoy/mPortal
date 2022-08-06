<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $likes =Like::with('uploads')->get();
    //     return view('backend.like.index', compact('likes'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request, $id)
    {
        if (Auth::check()) {

            $exists = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
            $count = 1;
            if (!$exists) {
                Like::create([
                'user_id' => Auth::id(),
                'upload_id' => $id,
                'count' => $count++,
            ]);
                return redirect()->back()->with('success', 'succeccfully liked this video.');

            }else{
                return redirect()->back()->with('error', 'You Already liked this video.');

            }

        }else{

            return response()->json(['error' => 'At First Login Your Account']);

        }

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     Like::findOrFail($id);
    //     return view('backend.like.show');
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //    $like = Like::findOrFail($id);
    //     return view('backend.like.edit', compact('like'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     Like::findOrFail($id)->update(($request->all()));
    //     return redirect()->back()->with('update', 'like has been update successfully.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     Like::findOrFail($id)->delete();
    //     return redirect()->back()->with('delete', 'like has been delete successfully.');
    // }

    public function Addlike(Request $request, $id)
    {
        if (Auth::check()) {

            $exists = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
            $count = 1;
            if (!$exists) {
                Like::create([
                'user_id' => Auth::id(),
                'upload_id' => $id,
                'count' => $count++,
            ]);
           return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            }else{

                return response()->json(['error' => 'You Already liked this video']);

            }

        }else{

            return response()->json(['error' => 'At First Login Your Account']);

        }
    }
    public function getwishlist()
    {
        $wishlist= Wishlist::where('user_id',Auth::id())->with('product')->get();
        return response()->json($wishlist);
    }
    public function removewishlist($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Product Remove']);
    }
}
