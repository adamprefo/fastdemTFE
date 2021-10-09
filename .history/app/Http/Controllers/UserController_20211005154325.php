<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Devis;
use App\Models\Packs;
use Illuminate\Http\Request;
use App\Http\UserControllers;
use App\Http\MilesControllers;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function home()
    {

        $users = User::all();
        //$user = User::find($id);

        return view('home', [
            'users' => $users
        ]);
        
     

    }

    //function devis

  /* public function devis(Request $request)
    {
        Devis::create([

            'startAddress' => $request->adressD,
            'finishAddress' =>  $request->adressA,
            'packs_id' =>  $request->packs_id,
            'user_id' => Auth::user()->id
            
        ]);
        return 'ok';
        
    }*/

    //affichage page
    public function about()
    {

        return view('about');
    }

    public function services()
    {

        return view('services');
    }

    public function contact()
    {

        return view('contact');
    }

    public function packs()
    {
        $packs = Packs::all();

        return view('packs', [
            'intent' => $packs,
           

        ]);
       

    }
    public function packsPromo()
    {

        return view('packsPromo');
    }
    public function Login()
    {

        return view('Login');
    }

    public function distance()
    {

        return view('distance');
    }
}
