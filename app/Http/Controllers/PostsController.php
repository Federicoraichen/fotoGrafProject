<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpload(Request $request)

    {

            $this->validate($request, [

          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


        $post = new Post($request->all());
        $post->save();

        $idPost = $post->id;

        $file = $request->file('image');
        $ext = $file->extension();
        $name = uniqid();
        $file->storeAs('/images/posts/post-'.$idPost, $name.'.'.$ext);

        //persiste en base
        $image = new \App\Image(['src' => '/images/posts/post-'.$idPost.'/'.$name.'.'.$ext]);
        $post->images()->save($image);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $categories = \App\Category::all();
          $post = Post::findOrFail($id);
          return view('posts.edit', compact('post','categories'));
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
          $post = Post::findOrFail($id);
          $post->fill($request->all());
          $post->save();
          return redirect()->route('posts.index');

          // return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $post = Post::findOrFail($id);
          $post->delete();
    }


//     public function images(Request $request, $id)
// {
//   //guardo el archivo
//   $post = Post::find($id);
//   $file = $request->file('file');
//   $ext = $file->extension();
//   $name = uniqid();
//   $file->storeAs('posts-'.$post->id, $name.'.'.$ext);
//
//   //persiste en base
//   $image = new \App\Image(['src' => 'post-'.$post->id.'/'.$name.'.'.$ext]);
//   $post->images()->save($image);
// }
}
