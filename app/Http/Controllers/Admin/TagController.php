<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tag;

class TagController extends Controller
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

    	$tags = Tag::orderBy('id','DESC')->get();

    	//dd($posts);

        return view('Admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.tags.create');
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
            'name' => 'required|unique:tags|max:25',
        ]);

        $tag = Tag::create([
            'name' => ucfirst($request['name']),
        ]);

        return redirect()->route('admin.tags.index')->with('status','Etiqueta creda con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id',$id)->first();

        return view('Admin.tags.edit',compact('tag'));
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
            'name' => 'required|unique:tags|max:25',
        ]);

        $tagToUpdate = Tag::where('id',$id)->first();

        $request['name'] = ucfirst($request['name']);

        $tagToUpdate->update($request->all());

        return redirect()->route('admin.tags.index')->with('status','Etiqueta actualizada con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id',$id)->first();

        $tag->delete();

        return redirect()->route('admin.tags.index')->with('status','Eliminado con exito');
    }
}
