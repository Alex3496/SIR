<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Post,Category};

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

        return view('publicViews.posts',[
            'posts' => $posts,
            'categories' => $this->getCategories(),
        ]);
    }

    public function post($slug)
    {

        $post = Post::where('slug',$slug)->first();

        return view('publicViews.post',[
            'post' => $post,
            'categories' => $this->getCategories(),
        ]);
    }

    public function postsCategories($name)
    {
        $category = Category::where('name',$name)->first();

        $posts = Post::where('category_id',$category->id)
                        ->orderBy('id','DESC')
                        ->paginate(3);

        return view('publicViews.posts',[
            'posts' => $posts,
            'categories' => $this->getCategories(),
        ]);

    }

/*-----------------------------------------------------------------*/

    public function getCategories()
    {
        return $categories = Category::orderBy('name')->get();
    }
}
