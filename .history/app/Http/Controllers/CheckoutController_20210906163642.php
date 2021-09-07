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
    public function checkout(Request $request)
    {   
         // Enter Your Stripe Secret
         \Stripe\Stripe::setApiKey('sk_test_51JVKzoItbSqJZhHFUzk2ZbtMKWWvZLpJDazjMxhMyLgByOVt5HLk1OPto5DUvsrO4k8fM4jfh32fqURJ8LMXjxnx00UUt9aFbK');
         $prix = Devis::all(); 	
         $amount = $prix->price
         $total *= 100;
         $amount = (int) $amount;
         
         $payment_intent = \Stripe\PaymentIntent::create([
             'description' => 'Stripe Test Payment',
             'amount' => $amount,
             'currency' => 'INR',
             'description' => 'Payment From Codehunger',
             'payment_method_types' => ['card'],
         ]);
         $intent = $payment_intent->client_secret;
 
         return view('checkout.credit-card',compact('intent'));
 
     }
 
            public function afterPayment()
            {
         echo 'Payment Has been Received';
            }
            
     
    
}