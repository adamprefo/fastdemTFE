<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Mail\MailDelete;
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
      $usersss = User::table()->where('id','12');
      dd($usersss);
  
    }
    public function delete($id)
    {
      $delete = Devis::find($id);
      $userId = $delete->user_id;
      
     
     

     dd($users);

     $userD= $delete->user_id;

     //if($delete == )
    
      
   

    

      $delete->delete(); 
      
     return redirect('/admin/devis')->with('message','le devis à bien été supprimer! un email seras envoyer à l\'utilisateur');

     Mail::to($user->email)->send(new MailDelete());
     
    }

    public function payer()
    {
      $devis = Devis::all();

        
      return view('devis.payer')->with([
            
        'devis' => $devis,

      ]);
      
    }


  }