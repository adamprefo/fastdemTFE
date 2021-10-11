<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Truck;
use App\Mail\MailDelete;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use Illuminate\Support\Facades\Auth;
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



  public function chart(MonthlyUsersChart $chart)
  {
      return view('admin.chart', ['chart' => $chart->build()]);
   
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
    public function deleteUser($id)
    {
      $deleteUser = User::find($id);

      $deleteUser->delete(); 
      
      return redirect('admin/user')->with('message','L\'utilisateur à bien été supprimer');
      
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
    //recup devis
    $delete = Reservation::find($id);
    $devisId  = $delete->devis_id;
    $devis = Devis::find($devisId);
    
    //recuperer user
    $userId = $devis->user_id;

    $users = User::all()->where('id', $userId);

    foreach ($users as $user);
    
    $mail = $user->email;

   
     Reservation::where('id', '=', $id)->delete();

      //$deleteRes->delete(); 

      Mail::to($mail)->send(new MailDelete());
      
      return redirect('admin/reservation')->with('message','La réservation à bien été annuler, un mail va être envoyer pour prévenir le client !');
      
    }

    public function dashboard()
    {
      $users = Auth::user(); 
      $userId = $users->id;
      $devis = Devis::all();
      $nbDevis = Devis::all('id')->count();
      $devisPayer = Devis::where('status','=', 'payer')->count();
      $devisPayer = Devis::where('status','=', '$userId ')->count(); 

      $devisPayer = Devis::where('id','=', 'payer')->count();
     


    
      $name = $users->name;
      $lastname = $users->lastname;
      $email = $users->email;
      $phone = $users->phone;
      $admin = $users->admin;
      $id = $users->id;


      
     
    
   
      return view('dashboard')->with([

       'name' => $name,
       'lastname' => $lastname,
       'email' => $email,
       'phone' => $phone,
       'admin' => $admin,
       'id' => $id,
       'devis' => $devis,
       'nbDevis' => $nbDevis,
       'alldevis' => $devis,
       'devisPayer'=> $devisPayer,
       'userId ' => $userId,

      ]);

    }
}
