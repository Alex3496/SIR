<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{userRequest,datasetRequest,insuranceRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /*MPORTANTE PARA CADA VEZ QUE SE UTILIZA AUTH*/ 
use App\{User,company_dataset,Insurance};
class ProfileUserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user=Auth::user();

        return view('User.profile',[
            'user'=>$user
        ]);
    }


    /**
     * Update the user auth.
     *
     * @param  \App\Http\Requests\userRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, User $user)
    {
        //dd($request->all());
        $user->update($request->all());

        //this aren't in the fillable array of user
        $user->company_address = $request->company_address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;

        $user->save();

        return back()->with('status', 'Actualizado con exito');
    }


    /**
     * Display view company profile
     *
     * @return \Illuminate\Http\Response
     */
    public function showCompany()
    {
        $user = Auth::user();
        $dataset = company_dataset::where('user_id',$user->id)->first();
        $insurance = User::find($user->id)->insurance;

        //dd($insurance);
        return view('User.companyProfile',[
            'user'=>$user,
            'dataset'=>$dataset,
            'insurance'=>$insurance,
        ]);
    }

    /**
     * create or update the user dataset.
     *
     * @param  \App\Http\Requests\userRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompany(datasetRequest $request)
    {
        //dd($request->all());
        $user=Auth::user()->id;

        $dataset = company_dataset::updateOrCreate(
            [
                'user_id' => $user
            ]
            ,
            [
                'dba_name' => $request->dba_name,
                'scac_code' => strtoupper($request->scac_code),
                'caat' => $request->caat,
                'mc_number' => $request->mc_number,
                'num_trucks' => $request->num_trucks,
                'certificate_ctpat' => $request->certificate_ctpat,
                'certificate_oae' => $request->certificate_oae,
                'fast' => $request->fast, 

                'warehouse' => $request->warehouse, 
                'fiscal_warehouse' => $request->fiscal_warehouse, 
                'position' => $request->position, 
            ]
        );

        return back()->with('status', 'Actualizado con exito');
    }


    /**
     * create or update the user insurance data.
     *
     * @param  \App\Http\Requests\Request;  $request
     */
    public function storeInsurance(insuranceRequest $request)
    {
        //dd($request->all());
        $user=Auth::user()->id;

        $dataset = Insurance::updateOrCreate(
            [
                'user_id' => $user
            ]
            ,
            [
                'name_insurance' => $request->name_insurance, 
                'contact_name' => $request->contact_name, 
                'general_liability_ins' => $request->has('general_liability_ins'),
                'commercial_general_liability' => $request->has('commercial_general_liability'),
                'auto_liability' => $request->has('auto_liability'),
                'motor_truck_cargo' => $request->has('motor_truck_cargo'),
                'trailer_interchange' => $request->has('trailer_interchange'),
            ]
        );

        return back()->with('status', 'Actualizado con exito');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        //dd($user->avatar);

        if($user->avatar == 'avatars/avatar.jpg'){
            $user->avatar =  $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }else{

            Storage::disk('public')->delete($user->avatar);
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }



        return back()->with('status', 'Imagen de perfil actualizada con exito');

    }

}
