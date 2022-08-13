<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Region;
use App\Models\Upload;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Upload::with('categories')->get());
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
            'thumbnail_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'upload' => 'mimes:mp3,mp4,3gp,mpeg,mkv,amv,avi',
            'region' => 'required',
            // 'upload_duration' => 'required',
        ]);
        //for image
        $newFileName = '';
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
        return response()->json(["message"=> "success","data" => $upload]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $upload = Upload::find($id);
        $countries =CountryListFacade::getList('en');
        return response()->json(["countries"=> $countries,"data" => $upload]);
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
            'upload' => 'mimes:mp3,mp4,3gp,mpeg,mkv,amv,avi',
            'region' => 'required',
        ]);


          $upload = Upload::findOrFail($id);

          $input = $request->all();

          $newFileName = '';
          if ($request->hasFile('thumbnail_image')) {
            if (file_exists(public_path($upload->thumbnail_image))) {
                unlink(public_path($upload->thumbnail_image));
            }
            $fileName = $request->file('thumbnail_image')->getClientOriginalExtension();
            if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                $uploadPath = 'uploads/' . Auth::user()->name . '/images/';
                $newFileName = $uploadPath.time() . '.' . $fileName;
                $request->thumbnail_image->move($uploadPath, $newFileName);
            }
            $input['thumbnail_image']= $newFileName;
        }
      //FOR VIDEO UPDATE
      if ($request->hasFile('upload')) {

        if (file_exists(public_path($upload->upload))) {
            unlink(public_path($upload->upload));
        }


        $video_Audio_extension = $request->file('upload')->getClientOriginalExtension();
        if ($video_Audio_extension == 'mp3') {
            $input['type'] = 1;
            $uploadPath = 'uploads/' . Auth::user()->name . '/audio/';
            $audioVideoFileName = $uploadPath.time() . '.' . $video_Audio_extension;
            $request->video->move($uploadPath, $audioVideoFileName);
            $input['upload']= $audioVideoFileName;
        } elseif ($video_Audio_extension == 'mp4' || $video_Audio_extension == '3gp' || $video_Audio_extension == 'mpeg') {
            $input['type'] = 2;
            $uploadPath = 'uploads/' . Auth::user()->name . '/video/';
                $uploadFileName = $uploadPath.time() . '.' . $video_Audio_extension;
                $request->upload->move($uploadPath, $uploadFileName);
            $input['upload'] = $uploadFileName;
        }else{
            $input['type'] = 3;
        }

    }
      $upload->update($input);
      return response()->json(["message"=> "updated","data" => $upload]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=  Upload::findOrFail($id);
        if (file_exists(public_path($delete->upload))) {
            unlink(public_path($delete->upload));
        }
        if (file_exists(public_path($delete->thumbnail_image))) {
            unlink(public_path($delete->thumbnail_image));
        }
        $delete->delete();
        return response()->json(["message"=> "deleted","data" => $delete]);
    }
    public function getMusic()
    {

       $uploads = Upload::where([['category_id', 1],['user_id', Auth::user()->id]] )->with('categories')->get();
       $roles = Role::all();
       return response()->json(["roles"=> $roles,"data" => $uploads]);
    }
    public function comedy()
    {

       $uploads = Upload::where([['category_id', 2],['user_id', Auth::user()->id]]  )->with('categories')->get();
       $roles = Role::all();
       return response()->json(["roles"=> $roles,"data" => $uploads]);
    }
    public function talent()
    {

       $uploads = Upload::where([['category_id', 3],['user_id', Auth::user()->id]])->with('categories')->get();
       $roles = Role::all();
       return response()->json(["roles"=> $roles,"data" => $uploads]);
    }
}
