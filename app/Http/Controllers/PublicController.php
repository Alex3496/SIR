<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PublicController extends Controller
{
    //

    public function index()
    {
    	return view('publicViews.index');
    }

    public function aboutUs()
    {
        return view('publicViews.aboutUs');
    }

    public function contactUs()
    {
        return view('publicViews.contact');
    }

    public function Faqs()
    {
        return view('publicViews.FAQs');
    }

    public function posts()
    {

        $posts = Post::orderBy('id','DESC')->paginate(3);

        return view('publicViews.blog',compact('posts'));
    }
}
