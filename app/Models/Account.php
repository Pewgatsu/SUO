<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'accounts';

    protected $primaryKey = 'id';

    protected $fillable = ['username',
        'password',
        'email',
        'account_type',
        'firstname',
        'lastname',
        'gender',
        'birthdate',
        'contact',
        'address'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function builds(){
        return $this->hasMany(Build::class);
    }

    public function store(){
        return $this->hasOne(Store::class);
    }
}
