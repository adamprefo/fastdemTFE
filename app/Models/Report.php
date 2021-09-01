<?php

namespace App\Models;

use App\Models\Reviews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;


    public function review()
    {
       return $this->belongsTo(Reviews::class);

    }
}
