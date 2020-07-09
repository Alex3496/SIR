<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Faq;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $faqs = Faq::orderBy('id','DESC')->get();


        return view('Admin.faqs.index',compact('user','faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('Admin.faqs.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question'  => 'required|unique:faqs|max:150',
            'answer'    => 'required|' 
        ]);

        $faqs = Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('status','Pregunta creda con exito');
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
        $faq = Faq::findOrFail($id);

        return view('Admin.faqs.edit',compact('faq','user'));
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
        $data = $request->validate([
            'question'  => 'required|max:150',
            'answer'    => 'required|' 
        ]);

        $faqToUpdate = Faq::findOrFail($id);

        $faqToUpdate->update($data);

        return redirect()->route('admin.faqs.index')->with('status','Pregunta actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqs = Faq::findOrFail($id);

        $faqs->delete();

        return redirect()->route('admin.faqs.index')->with('status','Eliminado con exito');
    }
}
