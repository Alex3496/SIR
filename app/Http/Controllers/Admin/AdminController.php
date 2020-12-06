<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\{User,Role,Tariff,Petition};
use DB;

class AdminController extends Controller
{

    private $month;
    private $year;

	public function __construct()
    {
        $this->middleware('auth');
        $this->month = date('m');
        $this->year = date('Y');    
    }

	
    public function index()
    {   
    	$usersCount = Role::findOrFail(3)->users->count();
        $usersMonth = User::whereMonth('created_at','=',$this->month)->whereYear('created_at','=', $this->year)
            ->whereHas('roles', function($q){$q->where('name', 'user');})->count(); //Do scope

        $user = Auth::user();
        $tariffsCount = Tariff::all()->count();
        $petitionCount = Petition::get()->count();
        //tarifa mas registrada
        $tariffMostUsed = DB::select("SELECT COUNT(`origin`) AS 'count',`origin`,`origin_state`,`origin_country`,`destiny`,`destiny_state`,`destiny_country`  FROM `tariffs` GROUP BY `origin`,`origin_state`,`origin_country`,`destiny_state`,`destiny_country`,`destiny`ORDER BY COUNT(`origin`) DESC");


    	return view('Admin.home',[
            'usersCount' => $usersCount,
            'user' => $user,
            'usersMonth' => $usersMonth,
            'tariffsCount' => $tariffsCount,
            'petitionCount' => $petitionCount,
            'tariffMostUsed' => $tariffMostUsed[0] ?? new \stdClass(),

        ]);
    }



    public function showProfile()
    {
        $user = Auth::user();

        return view('Admin.profile.index',compact('user'));
    }



    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $user->update($request->only(['name', 'phone', 'email','position']));

        return back()->with('status', 'Actualizado con exito');
    }



    public function changePassword(Request $request)
    {
        $user = Auth::user();


        $request = $request->validate([
            'password' => 'required|string|max:50',
            'new_password' => 'required|min:8|string|max:50|confirmed',
        ]);

        if(Hash::check($request['password'],$user->password)){
            
            $user->password = Hash::make($request['new_password']);
            $user->save();

            return back()->with('status', 'Contraseña actualizad con exito');

        } else {

            return back()->with('errorB', 'La contraseña no coincide');

        }

    }
}
