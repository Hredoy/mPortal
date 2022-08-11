<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index(){
        $country = null;
        $location = Location::get(request()->ip());
        // $location = Location::get('37.111.238.84');
        if(isset($location->countryName) && $location->countryName){
            $country = $location->countryName;
        };
        $upload = Upload::whereStatus(1)
        ->when($country, function ($query, $country) {
            return $query->where('region', $country);
        })
        ->get();

        $likeCheck = Like::where('user_id',Auth::id())->first();
        return view('frontend.homepage', ['uploads'=>$upload, "likeChecks"=> $likeCheck]);
    }
    public function music(){
        $country = null;
        $location = Location::get(request()->ip());
        if(isset($location->countryName) && $location->countryName){
            $country = $location->countryName;
        };

        $upload = Upload::whereStatus(1)->where('category_id', '1')
        ->when($country, function ($query, $country) {
            return $query->where('region', $country);
        })->get();
        // dd($upload);
        return view('frontend.categories.music', ['uploads'=>$upload]);
    }
    public function comedy(){
        $country = null;
        $location = Location::get(request()->ip());
        if(isset($location->countryName) && $location->countryName){
            $country = $location->countryName;
        };

        $upload = Upload::whereStatus(1)->where('category_id', '2')
        ->when($country, function ($query, $country) {
            return $query->where('region', $country);
        })->get();
        return view('frontend.categories.comedy', ['uploads'=>$upload]);
    }
    public function talent(){
        $upload = Upload::whereStatus(1)->where('category_id', '3')->get();
        return view('frontend.categories.talent', ['uploads'=>$upload]);
    }

    public function singleVideo($id){
       $upload = Upload::findOrFail($id);
       $likeCheck = Like::where('user_id',Auth::id())->where('upload_id',$id)->first();
       $cat_id = $upload->category_id;
		$relatedUpload = Upload::whereStatus(1)->where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->take(3)->get();
        return view('frontend.single_video', compact('upload', "likeCheck", "relatedUpload"));
    }
}
