<?php

namespace App\Models;

use App\Models\Devis;
use App\Models\Promos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Packs extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'name',
        'size_truck',
        'nb_workers',
        'time_workers',
        'price',
        
    ];
    public function devise()
    {
        return $this->belongsTo(Devis::class);


    }

    public function promo()
    {
        return $this->belongsTo(Promos::class);
    }
}
