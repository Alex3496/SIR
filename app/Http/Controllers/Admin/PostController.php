<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\{Post,Category,Tag};

class PostController extends Controller
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

    	$posts = Post::orderBy('id','DESC')->get();

    	//dd($posts);

        return view('Admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::orderBy('name','ASC')->get();

        $tags = Tag::orderBy('name','ASC')->get();
        
        //dd([$categories,$tags]);

        return view('Admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        
        $tags = $request['tags'];

        $post = Post::create($request->all());
        
        $post->tags()->attach($tags);

        if ($request->file('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
            $post->save();
        }

        return redirect()->route('admin.posts.index')->with('status','Etiqueta creda con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();

        $postTags = $post->tags->pluck('id')->toArray();

        $categories = Category::orderBy('name','ASC')->get();

        $tags = Tag::orderBy('name','ASC')->get();

        return view('Admin.posts.edit',compact('post','categories','tags','postTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $postToUpdate = Post::where('id',$id)->first();

        $postToUpdate->update($request->all());

        if ($request->file('image')) {

            Storage::disk('public')->delete($postToUpdate->image);
            $postToUpdate->image = $request->file('image')->store('posts', 'public');
            $postToUpdate->save();
        }

        return redirect()->route('admin.posts.index')->with('status','Articulo actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->first();

        $post->delete();

        return redirect()->route('admin.posts.index')->with('status','Eliminado con exito');
    }
}
