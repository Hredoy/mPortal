<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserbuyController extends Controller
{
    public function buyNowPage(Request $request, $id)
    {
        $upload = Upload::firstWhere('id', $id);
        // return $upload;
        return view('frontend.buy-now', compact('upload'));
    }

    public function buyNow(Request $request, $id)
    {
        Sell::create([
            'upload_id' => $request->upload_id,
            'buyer_id'  => Auth::user()->id,
            'price'     => $request->price
        ]);

        return redirect()->route('singleVideo', $id);


    }
}
