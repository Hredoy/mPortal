<?php

namespace App\Http\Controllers;

use App\Models\VideoManagement;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

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
        $videos = VideoManagement::all();
        //$videos =   VideoManagement::orderBy('name')->with('catename')->get();
        $roles = Role::all();
        return View('videomanagement.show-video', compact('videos', 'roles', 'page_title', 'empty_message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create A New Video';
        $roles = Role::all();
        $cagegories = Category::all();
        return view('videomanagement.create-video', compact('page_title', 'roles', 'cagegories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'thumbnail_image' => 'required|gt: 0',
                'category_id' => 'required',
                'video' => 'required|file|mimetypes:video/mp4',
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = VideoManagement::create([
            'title'             => strip_tags($request->input('title')),
            'thumbnail_image'       => strip_tags($request->input('thumbnail_image')),
            'category_id'        => strip_tags($request->input('category_id')),
            'video'            => $request->input('video'),
        ]);
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
    public function edit(VideoManagement $videoManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoManagement $videoManagement)
    {
        //
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
