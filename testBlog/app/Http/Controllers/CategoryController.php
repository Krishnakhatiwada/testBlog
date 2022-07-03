<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('trashed')) {
            $categories = Category::onlyTrashed()
                ->get();
        } else {
            $categories = Category::all();
        }

        return view('categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->image = time() . $originalImage->getClientOriginalName();
        $category->save();
        return redirect(route('categories.index'))->with('success', 'Categories Sucessfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $category = Category::where('id', $id)->first();
        $category->delete();
        return back()->with('success', 'Categories Sucessfully Deleted');
    }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();

        return redirect()->route('categories.index')->with('success', 'Categories Sucessfully Restored');
    }
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();

        return redirect()->back();
    }
}
