<?php

namespace App\Models;

use App\Models\Devis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class promos extends Model
{
    use HasFactory;


    
    public function devis()
    {
        return $this->belongsToMany(Devis::class);
    }
}
