<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lettre extends Model
{
    use HasFactory;

    protected $table = 'lettres';
    protected $primaryKey = 'ID_LETTRE';
    public $timestamps = false;
    protected $fillable = [
        'ID_USER',
        'TITRE_LETTRE',
        'CONTENU',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'ID_USER');
    }
}

