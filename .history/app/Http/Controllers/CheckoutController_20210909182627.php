<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Devis;
use Stripe\PaymentIntent;
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
         $client = Devis::find($id); 	
         $amount = $client->price;
         $amount *= 100;
         $amount = (int) $amount;

         
         //vue total
         $total = $client->price;
         $totalView = number_format($total,2,'.');
        
     
         
         $payment_intent = \Stripe\PaymentIntent::create([
             'description' => 'Stripe Test Payment',
             'amount' => $amount,
             'currency' => 'eur',
             'payment_method_types' => ['card'],
         ]);
        
        
         $intent = $payment_intent->client_secret;
        
         $statu = $client->status;
         
      
            
         if($statu === 'attente') {
            $client->update([
                
                'status' => 'payer',
            ]);
           
        }
                //mail confirmation
                
                $user=Auth::user();   
                Mail::to($user->email)->send(new TestMail());
                dd('ok');
         
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