<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Videos;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Illuminate\Support\Facades\Auth;

class VideoManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Showing Video Management';
        $empty_message = 'No Video is available.';
        $videos = Videos::with('categories')->get();
        $roles = Role::all();
        return View('backend.video-audio.index', compact('videos', 'roles', 'page_title', 'empty_message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create A New Video';
        $categories = Category::all();
        // $countries = Country::all();
        return view('backend.video-audio.create', compact('page_title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'video' => 'required|mimes:mp3,mp4,3gp,mpeg',
            'release_date' => 'required',
            'region_id' => 'required',
        ]);
        //for image
        if ($request->hasFile('thumbnail_image')) {
            $fileName = $request->file('thumbnail_image')->getClientOriginalExtension();
            if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                $newFileName = time() . '.' . $fileName;
                $uploadPath = public_path('video-audio/' . Auth::user()->name . '/images/');
                $request->thumbnail_image->move($uploadPath, $newFileName);
            }
        } 
        if ($request->hasFile('video')) {
            $video_Audio_extension = $request->file('video')->getClientOriginalExtension();
            if ($video_Audio_extension == 'mp3') {
                $audioVideoFileName = time() . '.' . $video_Audio_extension;
                $uploadPath = public_path('video-audio/' . Auth::user()->name . '/audio/');
                $request->video->move($uploadPath, $audioVideoFileName);
            } elseif ($video_Audio_extension == 'mp4' || $video_Audio_extension == '3gp' || $video_Audio_extension == 'mpeg') {
                $audioVideoFileName = time() . '.' . $video_Audio_extension;
                $uploadPath = public_path('video-audio/' . Auth::user()->name . '/video/');
                $request->video->move($uploadPath, $audioVideoFileName);
            }
        }
        $video = new Videos();
        $video->name = $request->name;
        $video->category_id = $request->category_id;
        $video->user_id  = Auth::user()->id;
        $video->thumbnail_image = $newFileName;
        $video->video_audio = $audioVideoFileName;
        $video->release_date = $request->release_date;
        $video->region_id = $request->region_id;
        $video->video_duration = $request->video_duration;
        $video->save();
        return redirect()->route('videos')->with('create', 'Video has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function show(VideoManagement $videoManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Update A New Video';
        $video = Videos::find($id);
        $categories = Category::all();
        $country = Country::all();
        return view('backend.video-audio.edit', compact('page_title', 'video', 'categories', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $videos, $id)
    {

      
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'video' => 'required|mimes:mp3,mp4,3gp,mpeg',
            'release_date' => 'required',
            'region_id' => 'required',
        ]);
        $post = Videos::find($id);
          //FOR PICTURE UPDATE
          global $old_image;
          $old_image = public_path('video-audio/' . Auth::user()->name . '/images/'.$videos->thumbnail_image);
          echo $old_image;
          die();
          //$old_image = public_path('/upoads/posts/' . $post->post_image);
          echo $old_image;
          die();
          if ($request->hasFile('thumbnail_image')) {
              if (file_exists(public_path($old_image))) {
                  unlink(public_path($old_image));
              }
              $image = $request->file('post_image');
              $image_name = time() . '.' . $image->getClientOriginalExtension();
              $destinationPath = public_path('/uploads/posts');
              $image->move($destinationPath, $image_name);
              $post->post_image =  $image_name;
          } else {
              $post->post_image =  $post->post_image;
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoManagement $videoManagement)
    {
        //
    }
}
