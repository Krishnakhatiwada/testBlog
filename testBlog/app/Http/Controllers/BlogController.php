<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogsCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('blog.blog', ['blogs' => $blogs]);
    }

    public function assignView()
    {
        $categories = Category::all();
        $blog = Blog::all();
        return view('blog.assign_categories', ['categories' => $categories, 'blog' => $blog]);
    }

    public function assignBlogCategory(Request $request)
    {
        $blogsCategory = new BlogsCategory();
        $blogsCategory->category_id = $request->categories_id;
        $blogsCategory->blog_id = $request->blog_id;
        $blogsCategory->save();
        return redirect(route('blog.index'))->with('success', 'Blog Sucessfully Assigend to Categories');
    }
    public function create()
    {

        $author = Author::all();
        return view('blog.add', ['author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tagString = explode(',', $request->tag);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author_id = $request->author_id;
        $blog->save();
        $blog->tag($tagString);
        // $blog->category()->attach($request->categories_id);

        return redirect(route('blog.index'))->with('success', 'Blog Sucessfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $author = Author::all();
        // $blog = Blog::find($id);
        return view('blog.edit', ['blog' => $blog, 'author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // $blog = Blog::find($id);
        $blog->title = $request->title;
        $tagString = explode(',', $request->tag);
        $blog->tag($tagString);
        $blog->content = $request->content;
        $blog->author_id = $request->author_id;
        $blog->update();
        return redirect(route('blog.index'))->with('success', 'Blog Sucessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // $blog = Blog::where('id', $id)->first();
        $blog->category()->detach();
        $blog->delete();
        return back()->with('success', 'Blog Sucessfully Deleted');
    }
}
