<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Region;
use App\Models\Upload;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;

class UploadController extends Controller
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
        // $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $page_title = 'Showing Video Management';
        $empty_message = 'No Video is available.';
        $uploads = Upload::with('categories')->get();
        $roles = Role::all();
        return View('backend.uploads.comedy', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create A New Upload';
        $categories = Category::all();
        // $regions = Region::all();
        $countries =CountryListFacade::getList('en');
        return view('backend.uploads.create', compact('page_title', 'countries','categories'));
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
            'upload' => 'required|mimes:mp3,mp4,3gp,mpeg,mkv,amv',
            'description' => 'required',
            'release_date' => 'required',

            // 'upload_duration' => 'required',
        ]);
        //for image
        if ($request->hasFile('thumbnail_image')) {
            $fileName = $request->file('thumbnail_image')->getClientOriginalExtension();
            if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                $uploadPath = 'uploads/' . Auth::user()->name . '/images/';
                $newFileName =$uploadPath.time() . '.' . $fileName;
                $request->thumbnail_image->move($uploadPath, $newFileName);
            }
        }
        if ($request->hasFile('upload')) {
            $upload_extension = $request->file('upload')->getClientOriginalExtension();
            if ($upload_extension == 'mp3') {
                $type = 1;
                $uploadPath = 'uploads/' . Auth::user()->name . '/audio/';
                $uploadFileName = $uploadPath.time() . '.' . $upload_extension;
                $request->upload->move($uploadPath, $uploadFileName);

            } elseif ($upload_extension == 'mp4' || $upload_extension == '3gp' || $upload_extension == 'mpeg') {
                $type = 2;
                $uploadPath = 'uploads/' . Auth::user()->name . '/video/';
                $uploadFileName = $uploadPath.time() . '.' . $upload_extension;
                $request->upload->move($uploadPath, $uploadFileName);
            }else {
                $type = 3;
            }
        }

        $upload = new Upload;
        $upload->name = $request->name;
        $upload->category_id = $request->category_id;
        $upload->user_id  = Auth::user()->id;
        $upload->description = $request->description;
        $upload->thumbnail_image = $newFileName;
        $upload->upload = $uploadFileName;
        $upload->release_date = $request->release_date;
        $upload->region = $request->region;
        $upload->type_id = $type;
        // $upload->upload_duration = $duration;
        $upload->save();
        return redirect()->route('public.upload')->with('create', 'File has been created successfully.');
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
        $page_title = 'Update A New Upload';
        $upload = Upload::find($id);
        $countries =CountryListFacade::getList('en');
        return view('backend.uploads.edit', compact('page_title', 'upload', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'upload' => 'mimes:mp3,mp4,3gp,mpeg',
            'release_date' => 'required',
            'region_id' => 'required',
        ]);
        $post = Upload::find($id);
        $post->fill($request->all());
          //FOR PICTURE UPDATE
          global $old_image;
          $old_image = 'uploads/' . Auth::user()->name . '/images/'.$post->thumbnail_image;

          if ($request->hasFile('thumbnail_image')) {
              if (file_exists(public_path($old_image))) {
                  unlink(public_path($old_image));
              }
              $fileName = $request->file('thumbnail_image')->getClientOriginalExtension();
              if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                  $uploadPath = 'uploads/' . Auth::user()->name . '/images/';
                  $newFileName = $uploadPath.time() . '.' . $fileName;
                  $request->thumbnail_image->move($uploadPath, $newFileName);
              }
                $post->thumbnail_image =  $newFileName;
          } else {
                $post->thumbnail_image =  $post->thumbnail_image;
          }
          //FOR VIDEO UPDATE
          global $old_video;
          $old_video = $post->upload;

          if ($request->hasFile('upload')) {
            if (file_exists($old_video)) {
                unlink($old_video);
            }


            $video_Audio_extension = $request->file('upload')->getClientOriginalExtension();
            if ($video_Audio_extension == 'mp3') {
                $type = 1;
                $uploadPath = 'uploads/' . Auth::user()->name . '/audio/';
                $audioVideoFileName = $uploadPath.time() . '.' . $video_Audio_extension;
                $request->video->move($uploadPath, $audioVideoFileName);
                $post->upload = $audioVideoFileName;
            } elseif ($video_Audio_extension == 'mp4' || $video_Audio_extension == '3gp' || $video_Audio_extension == 'mpeg') {
                $type = 2;
                $uploadPath = 'uploads/' . Auth::user()->name . '/video/';
                $audioVideoFileName = $uploadPath.time() . '.' . $video_Audio_extension;
                $request->video->move($uploadPath, $audioVideoFileName);
                $post->upload = $audioVideoFileName;
            }else{
                $type = 3;
            }
            $upload->type = $type;
        }
          $post->save();
          return redirect()->back()->with('create', 'File has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=  Upload::findOrFail($id);
        $old_image = 'uploads/' . Auth::user()->name . '/images/'.$delete->thumbnail_image;
        $old_video = 'uploads/' . Auth::user()->name . '/video/'.$delete->video_audio;
        if (file_exists(public_path($old_video))) {
            unlink(public_path($old_video));
        }elseif (file_exists(public_path($old_image))) {
            unlink(public_path($old_image));
        }
        $delete->delete();
        return redirect()->back()->with('delete', 'Video has been delete successfully.');
    }
    public function getMusic()
    {
       $page_title = 'Music Management';
       $empty_message = 'No Music is available.';
       $uploads = Upload::where('category_id', 1 )->with('categories')->get();
       $roles = Role::all();
       return View('backend.uploads.index', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }
    public function comedy()
    {
       $page_title = 'Comedy Management';
       $empty_message = 'No Comedy is available.';
       $uploads = Upload::where('category_id', 2 )->with('categories')->get();
       $roles = Role::all();
       return View('backend.uploads.index', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }
    public function talent()
    {
       $page_title = 'Talent Management';
       $empty_message = 'No Comedy is available.';
       $uploads = Upload::where('category_id', 3 )->with('categories')->get();
       $roles = Role::all();
       return View('backend.uploads.index', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }
}
