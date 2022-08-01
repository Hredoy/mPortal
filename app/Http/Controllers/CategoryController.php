<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $page_title = 'Showing Category Management';
        $empty_message = 'No Category is available.';
        $categories = Category::get();
        $roles = Role::all();
        return View('backend.category.index', compact('categories', 'roles', 'page_title', 'empty_message'));
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
        return view('backend.category.create', compact('page_title', 'categories'));
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
            'thumbnail_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        //for image
        if ($request->hasFile('thumbnail_image')) {
            $fileName = $request->file('thumbnail_image')->getClientOriginalExtension();
            if ($fileName == 'jpg' || $fileName == 'png' || $fileName == 'jpeg' || $fileName == 'gif' || $fileName == 'svg') {
                $newFileName = time() . '.' . $fileName;
                $uploadPath = public_path('category/' . Auth::user()->name . '/images/');
                $request->thumbnail_image->move($uploadPath, $newFileName);
            }
        } 
        $category = new Category();
        $category->category_name = $request->name;
        $category->thumbnail_image = $newFileName;
        $category->save();
        return redirect()->route('categories')->with('create', 'Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Update Category';
        $category = Category::find($id);
        return view('backend.category.edit', compact('page_title', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
