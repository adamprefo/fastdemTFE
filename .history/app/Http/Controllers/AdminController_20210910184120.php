<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use Illuminate\Http\Request;

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
      
      return redirect('devis.payer')->with('message','le devis à bien été supprimer! un mail seras envoyer à l\'utilisateur');
      
    }

    public function payer()
    {
      $deleteDevis = Devis::all();

      $deleteDevis->delete();
        
      return view('devis.payer')->with([
            
        'devis' => $deleteDevis,

      ]);
      
    }


  }