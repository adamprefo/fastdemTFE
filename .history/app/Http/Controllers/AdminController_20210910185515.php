<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class adminController extends Controller
{
    public function user()
    {
      $users = User::all();

        
      return view('admin.user')->with([
            
        'users' => $users,

      ]);

  
    }
    public function delete($id)
    {
      $delete = Devis::find($id);

      $delete->delete(); 
      
      return redirect('/admin/devis')->with('message','le devis à bien été supprimer! un email seras envoyer à l\'utilisateur');
      


      Mail::to($user->email)->send(new MailDelete($client,$packs, $user,$devis));
     
    }

    public function payer()
    {
      $devis = Devis::all();

        
      return view('devis.payer')->with([
            
        'devis' => $devis,

      ]);
      
    }


  }