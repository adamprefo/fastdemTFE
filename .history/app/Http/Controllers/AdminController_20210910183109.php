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
      
      return redirect('admin.payer')->with('message','l\'utilisateur à bien été supprimer!');
      
    }

    public function payer()
    {
      $devis = Devis::all();

        
      return view('devis.payer')->with([
            
        'devis' => $devis,

      ]);
      
    }


  }