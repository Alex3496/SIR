<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Category;


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

    	$user = Auth::user();
        $categories = Category::orderBy('id','DESC')->get();

        return view('Admin.categories.index',compact('categories','user'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('Admin.categories.create',compact('user'));
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
            'name' => 'required|unique:categories|max:25',
        ]);

        $categoty = Category::create([
            'name' => ucfirst($request['name']),
        ]);

        return redirect()->route('admin.categories.index')->with('status','Categoria creda con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $category = Category::where('id',$id)->first();

        return view('Admin.categories.edit',compact('category','user'));
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
            'name' => 'required|unique:categories|max:25',
        ]);

        $categotyToUpdate = Category::where('id',$id)->first();

        $request['name'] = ucfirst($request['name']);

        $categotyToUpdate->update($request->all());

        return redirect()->route('admin.categories.index')->with('status','Categoria actualizada con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();

        $category->delete();

        return redirect()->route('admin.categories.index')->with('status','Eliminado con exito');
    }
}
