<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Truck;
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

  
    }
    public function delete($id)
    {
      $delete = Devis::find($id);
      $userId  = $delete->user_id;

      $users = User::all()->where('id', $userId);
      
      foreach ($users as $user);
          $mail =$user->email;


      $delete->delete(); 

      Mail::to($mail)->send(new MailDelete());
      
      return redirect('/admin/devis')->with('message','le devis à bien été supprimer! un email seras envoyer à l\'utilisateur');

   
     
    }

    public function payer()
    {
      $devis = Devis::all();

        
      return view('devis.payer')->with([
            
        'devis' => $devis,

      ]);
      
    }
    public function camion(Request $request)
    {
      $this->validate($request,[

        'size' => 'required',
        'mCarrer' => 'required',



      ]);
      $trucks = new Truck;

      $trucks->size = $request->input('size');
      $trucks->mCarrer = $request->input('mCarrer');

      $trucks->save();

      return redirect('admin.camion')->with('message','Votre devis à bien été supprimer!');


        
      return view('admin.camion')->with([
            
        'trucks' => $trucks,

      ]);
      
    }
    
    

  }