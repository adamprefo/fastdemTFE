<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function user()
    {
      $users = User::all();
        
      return view('admin.user');
    }
}