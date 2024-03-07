<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Librarian extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens, HasFactory, Notifiable;

    // Additional model implementation...

    protected $fillable = [
        'name',
        'email',
        'password',
        // 'admin',
        // 'approved_at'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

   protected $casts = [
       'email_verified_at' => 'datetime',
       'password' => 'hashed',
   ];
}
