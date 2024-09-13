<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // In the User model
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address_line1',
        'address_line2',
        'city',
        'state_province',
        'postal_code',
        'country',
        'account_type',
        'balance',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
