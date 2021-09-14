<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Devis;
use App\Models\Packs;
use App\Mail\TestMail;
use App\Models\Reservation;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Exceptions\IncompletePayment;




class CheckoutController extends Controller

{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Devis::find($id);
        $user = Auth::user();
       
        return view('checkout.details')->with([
            
           'client' => $client,
           'user' => $user,
           'devis' => Devis::all(),
            'packs' => Packs::all(),
          

            
        ]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {

        \Stripe\Stripe::setApiKey('sk_test_51JVKzoItbSqJZhHFUzk2ZbtMKWWvZLpJDazjMxhMyLgByOVt5HLk1OPto5DUvsrO4k8fM4jfh32fqURJ8LMXjxnx00UUt9aFbK');

        //prix stripe
        $client = Devis::find($id);
        $amount = $client->price;
        $amount *= 100;
        $amount = (int) $amount;

        $time2 = '02:00:00';
        $time = $client->starTime;


$h =  strtotime($time);
$h2 = strtotime($time2);
 
$minute = date("i", $h2);
$second = date("s", $h2);
$hour = date("H", $h2);

$convert = strtotime("+$minute minutes", $h);
$convert = strtotime("+$second seconds", $convert);
$convert = strtotime("+$hour hours", $convert);
$new_time = date('H:i:s', $convert);

        //vue total
        $total = $client->price;
        $totalView = number_format($total, 2, '.');



        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'eur',
            'payment_method_types' => ['card'],
        ]);


        $intent = $payment_intent->client_secret;

        $statu = $client->status;



        if ($statu === 'attente') {
            $client->update([

                'status' => 'payer',
            ]);
        }

        //mail confirmation
        $packs = Packs::all();
        $user = Auth::user();
        $devis = Devis::all();

        Mail::to($user->email)->send(new TestMail($client,$packs, $user,$devis));


        
        $packId  = $client->packs_id;//n pack id du client

        $packs = Packs::all()->where('id', $packId); //recherche pack par l'id
        
        foreach ($packs as $pack);
        $truckId = $pack->truck_id;//recherche donner du pack avec l'id

        
            //finish time
        if($client->packs_id == 1){
        
            $time = $client->start_time;

            $total = $time + '02:00';

        }elseif($client->packs_id == 2){ 
            
            $price = $pack->price;

            $total = $price+$km_to_miles;
            

        }elseif($client->packs_id == 3){

            $price = $pack->price;
            
            $total = $price+$km_to_miles;
            
        };
        

        Reservation::create([
            'devis_id' => $client->id,
            'truck_id' => $truckId,
            'startDate' => $client->startDate,
            'starTime' => $client->start_time,
          
            
        ]);
   


        return view('checkout.index', [
            'intent' => $intent,
            'totalView' => $totalView,

        ]);
        
    }


    public function afterPayment()
    {

        return view('checkout.succes');
       
       


    }

    /*Card Number - 4242 4242 4242 4242
EXP - 12/32
CVV - 123
ZIP - 12345*/
}
