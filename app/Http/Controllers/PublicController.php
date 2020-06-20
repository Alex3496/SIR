<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchTeariffsRequest;
use App\{Post,Category,Location,Tariff};

class PublicController extends Controller
{
    //--------------------------------views----------------------------------------

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

    public function tariffsResults(SearchTeariffsRequest $request)
    {

        $originLocation = Location::complete($request->location_origin)->first();
        $destinyLocation = Location::complete($request->location_destiny)->first();

        $tariffs = Tariff::where('type_tariff',$request->type_tariff)
            ->where('origin',$originLocation->city)->where('destiny',$destinyLocation->city)->get();

        $dataSearch = $request->only(['type_tariff','location_origin','location_destiny','tpye_equipment']);

        return view('publicViews.tariffs',compact('originLocation','destinyLocation','tariffs','dataSearch'));
    }

/*------------------------------Methods-----------------------------------*/

    public function getCategories()
    {
        return $categories = Category::orderBy('name')->get();
    }
}
