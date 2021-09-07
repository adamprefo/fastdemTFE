<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Packs;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      return view('devis.index')->with([
        
          'devis' => Devis::all(),
          'packs' => Packs::all(),
      ]);
    }

    public function delete($id)
    {
      $deleteDevis = Devis::find($id);

      $deleteDevis->delete(); 
      
      return redirect()->route('devis')->with('message', 'Votre profile à bien été modifié!');
      
    }
}