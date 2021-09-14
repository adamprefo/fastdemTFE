<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Packs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MilesController extends Controller
{
    public function miles(Request $request){
        
        $date = $request->startDate;

        dd($date);
        
        $pick = str_replace(' ', '', $request->input('origin'));
        $delivery = str_replace(' ', '', $request->input('destination'));
       
        $mileage_result = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=' . $pick . '&destinations=' . $delivery . '&key=AIzaSyCAb1UA5bvaHAPMhM-B1jAGeh0z5AiD27g');


        $mileage_result = json_decode($mileage_result);

      

        //dd($mileage_result);

        $mileage = $mileage_result->rows[0]->elements[0]->distance->text;

        $clean_miles = preg_replace('/[^0-9.]+/','', $mileage);
        
        //dd($clean_miles);
        $km_to_miles =  $clean_miles * 1.60934; //miles to => kilomètres

        //dd($km_to_miles);

        //récupération des packs
        $packs = Packs::all();
        foreach($packs as $pack);

        //choix du pack & adaptation des prix + ajout des kilomètres -> 1euros le kilometres + prix Pack de prix choisis
        if($request->packs_id == 1){
        
            $price = $pack->price;

            $total = $price+$km_to_miles;
            
            $totalClean =  number_format($total,2,'.');

        }elseif($request->packs_id == 2){ 
            
            $price = $pack->price;

            $total = $price+$km_to_miles;
            
            $totalClean =  number_format($total,2,'.');

        }elseif($request->packs_id == 3){

            $price = $pack->price;
            
            $total = $price+$km_to_miles;
            
            $totalClean = number_format($total,2,'.');
        };
        

        //Envoie à la base de donnée les informations du devis 
        Devis::create([

            'startAddress' => $request->origin,
            'finishAddress' =>  $request->destination,
            'price'=> $totalClean,
            'startDate'=> $request,
            'packs_id' =>  $request->packs_id,
            'user_id' => Auth::user()->id
 
        ]);

        Devis::create([

            'startAddress' => $request->origin,
            'finishAddress' =>  $request->destination,
            'price'=> $totalClean,
            'packs_id' =>  $request->packs_id,
            'user_id' => Auth::user()->id
 
        ]);

        

        return view('getMiles');
       



    }
}
