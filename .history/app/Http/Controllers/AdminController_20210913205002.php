<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Truck;
use App\Mail\MailDelete;
use App\Models\Reservation;
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
    $mail = $user->email;


    $delete->delete();

  

    return redirect('/admin/devis')->with('message', 'le devis à bien été supprimer! un email seras envoyer à l\'utilisateur');
  }



  public function payer()
  {
    $devis = Devis::all();


    return view('devis.payer')->with([

      'devis' => $devis,

    ]);
  }

  public function camion()
  {
    $trucks = Truck::all();
    return view('admin.camion')->with([

      'trucks' => $trucks,

    ]);
  }


  public function add(Request $request)
  
  {
 
    
    Truck::create([

      'size' => $request->size,
      'mCarrer' =>  $request->mCarrer,
      
  ]);

    return redirect('admin/camion')->with('message', 'Votre nouveau camion à bien été ajouté!');

  }
  public function deleteCamion($id)
    {
      $deleteCam = Truck::find($id);

      $deleteCam->delete(); 
      
      return redirect('admin/camion')->with('message','Votre camion à bien été supprimer!');
      
    }



    public function reservation()
    {
      $reservations = Reservation::all();
    
        return view('admin.reservation')->with([

        'reservations' => $reservations,

      ]);
      
    }
    public function deleteRes($id)
    {

    $delete = Devis::find($id);
    $userId  = $delete->user_id;
    dd($userId);

    $users = User::all()->where('id', $userId);

    foreach ($users as $user);
    $mail = $user->email;

   
      $deleteRes = Reservation::find($id);

      $deleteRes->delete(); 

      Mail::to($mail)->send(new MailDelete());
      
      return redirect('admin/reservation')->with('message','La réservation à bien été annuler, un mail va être envoyer pour prévenir le client!');
      
    }
}
