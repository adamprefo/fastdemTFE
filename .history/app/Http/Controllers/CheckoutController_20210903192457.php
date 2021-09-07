<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Devis;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Exceptions\IncompletePayment;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $devis = Devis::all();
        foreach($devis as $devi);
        $total = $devi->price;

    
        Stripe::setApiKey("sk_test_51JVKzoItbSqJZhHFUzk2ZbtMKWWvZLpJDazjMxhMyLgByOVt5HLk1OPto5DUvsrO4k8fM4jfh32fqURJ8LMXjxnx00UUt9aFbK");
        
        $intent = PaymentIntent::create([
            'amount' => round($total*100),
            'currency' => 'eur',
           ]); 

        $user= Auth::user();
        
        try {
                
            ($request->pmethod);
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'checkout.index',
                [$exception->payment->id, 'redirect' => route('paiement')]
            );
        }


        $clientSecret = Arr::get($intent, 'client_secret');


            
        return view('checkout.index',[
            'clientSecret' => $clientSecret
        ]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
