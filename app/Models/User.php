<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $primaryKey = 'ID_USER';

    public $timestamps = false;

    protected $fillable = [
        'NOM',
        'PRENOM',
        'EMAIL',
        'password',
        'TYPE',
    ];
    
}
