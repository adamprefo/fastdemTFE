<?php

namespace App\Models;

use App\Models\Devis;
use App\Models\Truck;
use App\Models\Reviews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;


    public function devis()
    {
        return $this->belongsToMany(Devis::class);
    }

    
    public function trucks()
    {
        return $this->belongsToMany(Truck::class);
    }

    
    public function review()
    {
        return $this->hasOne(Reviews::class);
    }
}
