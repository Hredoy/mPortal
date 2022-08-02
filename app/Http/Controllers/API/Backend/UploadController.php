<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Region;
use App\Models\Upload;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Image;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Upload::with('categories','regions')->get());
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
            'upload' => 'required|mimes:mp3,mp4,3gp,mpeg',
            'description' => 'required',
            'release_date' => 'required',
            'region_id' => 'required',
            'upload_duration' => 'required',
        ]);
        //for image
        if ($request->hasFile('thumbnail_image')) {

            $exploed1 = explode(";", $request->product_image);
             $exploed2 = explode("/", $exploed1[0]);
             $newFileName =  time().'.'.$exploed2[1];
 
             Image::make($request->thumbnail_image)->save(public_path('uploads/' . Auth::user()->name . '/images/'),50);

        } 
        if ($request->hasFile('upload')) {
            $upload_extension = $request->file('upload')->getClientOriginalExtension();
            if ($upload_extension == 'mp3') {
                $uploadFileName = time() . '.' . $upload_extension;
                $uploadPath = public_path('uploads/' . Auth::user()->name . '/audio/');
                $request->upload->move($uploadPath, $uploadFileName);
            } elseif ($upload_extension == 'mp4' || $upload_extension == '3gp' || $upload_extension == 'mpeg') {
                $uploadFileName = time() . '.' . $upload_extension;
                $uploadPath = public_path('uploads/' . Auth::user()->name . '/video/');
                $request->upload->move($uploadPath, $uploadFileName);
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
        $upload->region_id = $request->region_id;
        $upload->type = $request->type;
        $upload->upload_duration = $request->upload_duration;
        $upload->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Upload::with('categories', 'regions')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'video' => 'mimes:mp3,mp4,3gp,mpeg',
            'release_date' => 'required',
            'region_id' => 'required',
        ]);
        $post = Upload::find($id);
        $post->fill($request->all());
          //FOR PICTURE UPDATE
          global $old_image;
          $old_image = public_path('uploads/' . Auth::user()->name . '/images/'.$post->thumbnail_image);
        
          if ($request->hasFile('thumbnail_image')) {
              if (file_exists(public_path($old_image))) {
                  unlink(public_path($old_image));
              }
              $exploed1 = explode(";", $request->product_image);
              $exploed2 = explode("/", $exploed1[0]);
              $newFileName =  time().'.'.$exploed2[1];
  
              Image::make($request->thumbnail_image)->save(public_path('uploads/' . Auth::user()->name . '/images/'),50);
              
                $post->thumbnail_image =  $newFileName;
          } else {
                $post->thumbnail_image =  $post->thumbnail_image;
          }
          //FOR VIDEO UPDATE
          global $old_video;
          $old_video = public_path('uploads/' . Auth::user()->name . '/video/'.$post->upload);
       
          if ($request->hasFile('upload')) {
            if (file_exists(public_path($old_video))) {
                unlink(public_path($old_video));
            }


            $video_Audio_extension = $request->file('upload')->getClientOriginalExtension();
            if ($video_Audio_extension == 'mp3') {
                $audioVideoFileName = time() . '.' . $video_Audio_extension;
                $uploadPath = public_path('uploads/' . Auth::user()->name . '/audio/');
                $request->video->move($uploadPath, $audioVideoFileName);
            } elseif ($video_Audio_extension == 'mp4' || $video_Audio_extension == '3gp' || $video_Audio_extension == 'mpeg') {
                $audioVideoFileName = time() . '.' . $video_Audio_extension;
                $uploadPath = public_path('uploads/' . Auth::user()->name . '/video/');
                $request->video->move($uploadPath, $audioVideoFileName);

                $post->upload = $audioVideoFileName;
            }
        }
          $post->save();
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=  Upload::wherId($id);
        $old_image = public_path('uploads/' . Auth::user()->name . '/images/'.$delete->thumbnail_image);
        $old_video = public_path('uploads/' . Auth::user()->name . '/video/'.$delete->video_audio);
        if (file_exists(public_path($old_video))) {
            unlink(public_path($old_video));
        }elseif (file_exists(public_path($old_image))) {
            unlink(public_path($old_image));
        }
        $delete->delete();
    }
    public function music()
    {
       $uploads = Upload::where('category_id', 1 )->with('categories', 'regions')->get();
       return response()->json($uploads);
      
    }
    public function comedy()
    {
       $uploads = Upload::where('category_id', 2 )->with('categories', 'regions')->get();
       return response()->json($uploads);
    }
    public function talent()
    {
       $uploads = Upload::where('category_id', 3 )->with('categories', 'regions')->get();
       return response()->json($uploads); 
    }
}
