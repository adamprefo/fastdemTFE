<?php

namespace App\Http\Controllers;

use App\Models\User;
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
      $deleteDevis = User::find($id);

      $deleteDevis->delete(); 
      
      return redirect('admin.user')->with('message','l\'utilisateur à bien été supprimer!');
      
    }
}