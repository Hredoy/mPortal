<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Region;
use App\Models\Upload;
use App\Models\Multi_image;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;
use File;
use Image;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $page_title = 'Create A New Upload';
        return view('backend.uploads.comedy', compact('page_title'));
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
        $countries = CountryListFacade::getList('en');
        return view('backend.uploads.create', compact('page_title', 'countries', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($request->file('thumbnail_image'));
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail_image' => 'required',
            'thumbnail_image.*' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'upload' => 'mimes:mp3,mp4,3gp,mpeg,mkv,amv,avi',
            'region' => 'required',
            // 'upload_duration' => 'required',
        ]);
        //for image
          $newFileName = '';
        if ($request->hasFile('thumbnail_image')) {
            $images = $request->file('thumbnail_image');
            foreach ($images as $key => $img) {
                if ($key === array_key_first($images)) {
                    $fileName = $img->getClientOriginalExtension();
                    if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                        $uploadPath = 'uploads/' . Auth::user()->name . '/images/';
                        $newFileName = $uploadPath . time() . $fileName;
                        Image::make($img)->resize(215,346)->save($newFileName);
                }
            }

                $fileName = $img->getClientOriginalExtension();
                if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                    $uploadPath = 'uploads/' . Auth::user()->name . '/images/multi_img';
                    $multiImgName = $uploadPath . time() . '.' . $fileName;
                    $img->move($uploadPath, $multiImgName);
                    $imgName[] =$multiImgName;
                }



            }
        }

        $uploadFileName = '';
        if ($request->hasFile('upload')) {
            $upload_extension = $request->file('upload')->getClientOriginalExtension();
            if ($upload_extension == 'mp3') {
                $type = 1;
                $uploadPath = 'uploads/' . Auth::user()->name . '/audio/';
                $uploadFileName = $uploadPath . time() . '.' . $upload_extension;
                $request->upload->move($uploadPath, $uploadFileName);
            } elseif ($upload_extension == 'mp4' || $upload_extension == '3gp' || $upload_extension == 'mpeg') {
                $type = 2;
                $uploadPath = 'uploads/' . Auth::user()->name . '/video/';
                $uploadFileName = $uploadPath . time() . '.' . $upload_extension;
                $request->upload->move($uploadPath, $uploadFileName);
            } else {
                $type = 3;
            }
            // For calculate file duration
            $getID3 = new \getID3;
            $durationtime =  $getID3->analyze($uploadFileName);
            $duration =  $durationtime['playtime_string'];
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
        $upload->type_id = $type ?? null;
        $upload->upload_duration = $duration ?? null;
        $upload->sell = $request->sell;
        $upload->price = $request->price;
        $upload->save();

        //multi img odj
        Multi_image::create([

            'upload_id' => $upload->id,
            'image' => json_encode($imgName),


        ]);

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
        $countries = CountryListFacade::getList('en');
        return view('backend.uploads.edit', compact('page_title', 'upload', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

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
                $newFileName = $uploadPath . time() . '.' . $fileName;
                $request->thumbnail_image->move($uploadPath, $newFileName);
            }
            $input['thumbnail_image'] = $newFileName;
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
                $audioVideoFileName = $uploadPath . time() . '.' . $video_Audio_extension;
                $request->video->move($uploadPath, $audioVideoFileName);
                $input['upload'] = $audioVideoFileName;
            } elseif ($video_Audio_extension == 'mp4' || $video_Audio_extension == '3gp' || $video_Audio_extension == 'mpeg') {
                $input['type'] = 2;
                $uploadPath = 'uploads/' . Auth::user()->name . '/video/';
                $uploadFileName = $uploadPath . time() . '.' . $video_Audio_extension;
                $request->upload->move($uploadPath, $uploadFileName);
                $input['upload'] = $uploadFileName;
            } else {
                $input['type'] = 3;
            }
            $input['sell'] = $request->sell;
            $input['price'] = $request->price;
            // For calculate file duration
            $getID3 = new \getID3;
            $durationtime =  $getID3->analyze($uploadFileName);
            $duration =  $durationtime['playtime_string'];
            $input['upload_duration'] = $duration;

        }
        $upload->update($input);

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
        $delete =  Upload::findOrFail($id);
        if (File::exists($delete->upload)) {
            unlink(public_path($delete->upload));
        }
        if (File::exists($delete->thumbnail_image)) {
            unlink(public_path($delete->thumbnail_image));
        }
        $delete->delete();

        return redirect()->back()->with('delete', 'File has been delete successfully.');
    }
    public function getMusic()
    {
        $page_title = 'Music Management';
        $empty_message = 'No Music is available.';
        $uploads = Upload::where([['category_id', 1], ['user_id', Auth::user()->id]])->with('categories')->get();
        $roles = Role::all();
        return View('backend.uploads.index', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }
    public function comedy()
    {
        $page_title = 'Comedy Management';
        $empty_message = 'No Comedy is available.';
        $uploads = Upload::where([['category_id', 2], ['user_id', Auth::user()->id]])->with('categories')->get();
        $roles = Role::all();
        return View('backend.uploads.index', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }
    public function talent()
    {
        $page_title = 'Talent Management';
        $empty_message = 'No Comedy is available.';
        $uploads = Upload::where([['category_id', 3], ['user_id', Auth::user()->id]])->with('categories')->get();
        $roles = Role::all();
        return View('backend.uploads.index', compact('uploads', 'roles', 'page_title', 'empty_message'));
    }
}
