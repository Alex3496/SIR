<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InfoMessage;
use Illuminate\Support\Facades\Mail;
use App\{Post,Category,Location,Tariff};
use App\Http\Requests\{SearchTeariffsRequest,InformationRequest};

class PublicController extends Controller
{
    //--------------------------------views----------------------------------------

    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->take(9)->get();

        /*dd($posts);*/

    	return view('publicViews.index',compact('posts'));
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
            ->origin($originLocation->city)
            ->destiny($destinyLocation->city)
            ->equipment($request->tpye_equipment)->get();

        $request['tpye_equipment']= $this->translate($request->tpye_equipment);

        $dataSearch = $request->only(['type_tariff','location_origin','location_destiny','tpye_equipment']);

        return view('publicViews.tariffs',compact('originLocation','destinyLocation','tariffs','dataSearch'));
    }

    public function sendInformation(InformationRequest $request)
    {
        $information = $request->all();

        Mail::to('informacion@ibookingsystem.com')->send(new InfoMessage($request));

        return redirect()->route('principal')->with('status','Tu mensaje ha sido enviado, recibiras una repuesta proximamente');
    }

/*------------------------------Methods-----------------------------------*/

    public function getCategories()
    {
        return $categories = Category::orderBy('name')->get();
    }

    public function translate($tpye_equipment)
    {
        if($tpye_equipment == 'Dry Box') return 'Caja Seca';
        if($tpye_equipment == 'Refrigerated') return 'Caja Refrigerada';
        if($tpye_equipment == 'Plataform') return 'Plataforma';
        if($tpye_equipment == 'Container') return 'Contenedor';
        if($tpye_equipment == 'Box') return 'Caja';
        if($tpye_equipment == 'Package') return 'Bulto';
        return 'Pallet';
    }
}
