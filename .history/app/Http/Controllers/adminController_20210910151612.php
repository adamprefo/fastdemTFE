<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function user()
    {
        
      return view('admin.user');
    }
