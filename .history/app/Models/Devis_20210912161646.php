<?php

namespace App\Models;
use App\Models\User;
use App\Models\Packs;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devis extends Model
{
    use HasFactory;

    protected $table = 'devis';

    protected $fillable = [
        'startAddress',
        'finishAddress',
        'price',
        'user_id',
        'packs_id',
        'status',
        'startDate',
       
        
    ];

    public function setDate($value)
    {
        $this->attributes['startDate'] = Carbon::createFromFormat('m/d/Y',$value)->format('Y-m-d');
    }
    public $timestamps = false;


    public function user()
    {
       return $this->belongsTo(User::class);

    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function pack()
    {
        return $this->hasOne(Packs::class);


    }

}
