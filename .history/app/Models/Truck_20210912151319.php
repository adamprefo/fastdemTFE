<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Truck extends Model
{
    use HasFactory;
    protected $fillable = [

        'id',
        'size',
      
    ];
    
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
