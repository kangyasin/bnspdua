<?php

namespace App\Http\Controllers;
use App\Blog;
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
        $DataBlogs = Blog::all();
        return view('admin/blog', compact('DataBlogs'));
    }

    public function add_blog()
   {
       return view('admin/add_blog');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $blog = new Blog;
      $blog->title = 'ini post satu';
      $blog->description = 'ini deskripsi satu';
      $blog->save();

      return 'article saved';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->hasfile('filename')) {
          $file = $request->file('filename');
          $name = time() . $file->getClientOriginalName();
          $file->move(public_path() . '/images/', $name);
      }
      $blog = new Blog;
      $blog->title = $request->get('name');
      $blog->description = $request->get('description');
      $blog->save();

      return redirect('adminblog')->with('success', 'Information has been added');
    }

    public function edit_blog($id)
    {
        $blog = Blog::find($id);
        return view('admin/edit_blog', compact('blog', 'id'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
      $blog = Blog::find($id);
      $blog->title = $request->get('name');
      $blog->description = $request->get('description');
      $blog->save();
      return redirect('adminblog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $blog = Blog::find($id);
     $blog->delete();
     return redirect('adminblog')->with('success', 'Information has been  deleted');
    }
}
