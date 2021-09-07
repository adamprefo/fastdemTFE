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

        return view('checkout.index')->with([
            
        ]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout($id,Request $request)
    {   
        
         \Stripe\Stripe::setApiKey('sk_test_51JVKzoItbSqJZhHFUzk2ZbtMKWWvZLpJDazjMxhMyLgByOVt5HLk1OPto5DUvsrO4k8fM4jfh32fqURJ8LMXjxnx00UUt9aFbK');
         $prix = Devis::find($id); 	
         $amount = $prix->price;
         $amount *= 100;
         $amount = (int) $amount;

         dd($amount);
         $payment_intent = \Stripe\PaymentIntent::create([
             'description' => 'Stripe Test Payment',
             'amount' => $amount,
             'currency' => 'eur',
             'payment_method_types' => ['card'],
         ]);

         $intent = $payment_intent->client_secret;
         $paymentData = $payment_intent;
         
 
         return view('checkout.index',compact('intent'),[
             'total' =>$amount
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