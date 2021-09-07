<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Devis;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
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
      
        $showPayement = Devis::find($id); 

        return view('checkout.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout($id,Request $request)
    {   
        
         \Stripe\Stripe::setApiKey('pk_test_51JVKzoItbSqJZhHFXRRSMg1EpUQjwsRYx0tfNUgBa9JYv1PAJqWFC1ciN3Kk7apQH8aeu1Iy2KAeFLztkp7WCdwu00Y58HbEOq');
         $prix = Devis::find($id); 	
         $amount = $prix->price;
         $amount *= 100;
         $amount = (int) $amount;

         
         $payment_intent = \Stripe\PaymentIntent::create([
             'description' => 'Stripe Test Payment',
             'amount' => $amount,
             'currency' => 'INR',
             'description' => 'Payment From Codehunger',
             'payment_method_types' => ['card'],
         ]);
         $intent = $payment_intent->client_secret;
 
         return view('checkout.index',compact('intent'));
 
     }
 
            public function afterPayment()
            {
         echo 'Payment Has been Received';
            }
            
     
    
}