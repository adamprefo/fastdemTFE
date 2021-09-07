<?php

namespace App\Models;

use App\Models\Devis;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory,Notifiable,Billable;

    public $timestamps = false;

    public function devis()
    {
        return $this->hasMany(Devis::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'startAddress',
        'finishAddress',
        'user_id',
        'name',
        'lastname',
        'phone',
        'email',
        'password',
        'created_at',
        'updated_at',
        'admin',

        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
