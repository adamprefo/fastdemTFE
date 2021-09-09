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
    public function show()
    {    
     
        
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
         $prix = Devis::find($id); 	
         $amount = $prix->price;
         $amount *= 100;
         $amount = (int) $amount;
        
         //vue total
         $total = $prix->price;
         $totalView = number_format($total,2,'.');
        

         
         $payment_intent = \Stripe\PaymentIntent::create([
             'description' => 'Stripe Test Payment',
             'amount' => $amount,
             'currency' => 'eur',
             'payment_method_types' => ['card'],
         ]);
        
        
         $intent = $payment_intent->client_secret;

         if($prix->status === 'attente'){
             $prix->update([
                 'status' => 'payer'
             ]);
         }
         dd($prix);
         return view('checkout.index',[ 
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