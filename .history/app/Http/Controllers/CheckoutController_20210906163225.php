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
    public function index(Request $request)
    {   
         // Enter Your Stripe Secret
         \Stripe\Stripe::setApiKey('use-your-stripe-key-here');
        		
         $amount = 100;
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
 
         return view('checkout.credit-card',compact('intent'));
 
     }
 
     public function afterPayment()
     {
         echo 'Payment Has been Received';
     }
            
     
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
