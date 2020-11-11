<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InfoMessage;
use Illuminate\Support\Facades\Mail;
use App\{Post,Category,Location,Tariff,Faq,Petition};
use App\Http\Requests\{SearchTeariffsRequest,InformationRequest};

class PublicController extends Controller
{
    //--------------------------------views----------------------------------------

    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->take(9)->get();

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
        $faqs = Faq::orderBy('id', 'desc')->get();

        return view('publicViews.FAQs',compact('faqs'));
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

    /**
    *   @function tariffsResults
    *   Metodo que se ejecuta cuando el usuario realiza una busqueda de tarifas, introduciendo el origen,
    *   destino y tipo de contenedor, lo redirige a otra vista con los resultados
    * 
    */
    public function tariffsResults(SearchTeariffsRequest $request)
    {
        //dd($request->all());
        //Se supone que el usuario ingresa el ubicacion completa con la ayuda del autollenado
        $originLocation = Location::complete($request->location_origin)->where('status','ACCEPTED')->first();
        $destinyLocation = Location::complete($request->location_destiny)->where('status','ACCEPTED')->first();

        if($request['Peticion'] && $destinyLocation != null && $originLocation != null){
            $petitions = Petition::origin($originLocation->city)
                ->destiny($destinyLocation->city)
                ->equipment($request->tpye_equipment)->paginate(10);
            $total = $petitions->total();
        } else if($destinyLocation != null && $originLocation != null){
            $tariffs = Tariff::where('type_tariff',$request->type_tariff)
                ->origin($originLocation->city)
                ->destiny($destinyLocation->city)
                ->equipment($request->tpye_equipment)->paginate(10);
            //total de registros sin paginacion
            $total = $tariffs->total();
        }else{
            $tariffs = collect(); //empty collection
            $petitions = collect(); //empty collection
            $total = 0;
        }

        if(isset($petitions) || $request['Peticion']){
            
            $request['type_equip']= $request->tpye_equipment;
            $request['tpye_equipment']= $this->translate($request->tpye_equipment);
            $dataSearch = $request->only(['type_tariff','location_origin','location_destiny','tpye_equipment','type_equip']);

            return view('publicViews.petitions',compact('originLocation','destinyLocation','petitions','dataSearch','total'));

        }else{

            //Sirve para mostar el valor escogido en los <select>
            $request['type_equip']= $request->tpye_equipment;
            //Muestra el equipo seleccionado traducido
            $request['tpye_equipment']= $this->translate($request->tpye_equipment);
            //Array que alamcena los valores de busqueda de tafifas
            $dataSearch = $request->only(['type_tariff','location_origin','location_destiny','tpye_equipment','type_equip']);

            return view('publicViews.tariffs',compact('originLocation','destinyLocation','tariffs','dataSearch','total'));
        }

    }


    /*
    *
    *   Un usuario manda un mensaje a el personal encargado para resolver alguna duda
    *
    */
    public function sendInformation(InformationRequest $request)
    {
        $information = $request->all();

        Mail::to('info@ibookingsystem.com')->send(new InfoMessage($request));

        return redirect()->route('principal')->with('status','Tu mensaje ha sido enviado, recibiras una repuesta proximamente');
    }

/*------------------------------Methods-----------------------------------*/

    public function getCategories()
    {
        return $categories = Category::orderBy('name')->get();
    }

    public function translate($tpye_equipment)
    {   
        if($tpye_equipment == 'Any') return 'Cualquiera';
        if($tpye_equipment == 'Dry Box') return 'Caja Seca';
        if($tpye_equipment == 'Refrigerated') return 'Caja Refrigerada';
        if($tpye_equipment == 'Plataform') return 'Plataforma';
        if($tpye_equipment == 'Container') return 'Contenedor';
        if($tpye_equipment == 'Box') return 'Caja';
        if($tpye_equipment == 'Package') return 'Bulto';
        return 'Pallet';
    }
}
