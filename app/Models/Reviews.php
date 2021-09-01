<?php

namespace App\Models;

use App\Models\Report;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory;

    
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }
}
