<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    protected $table = 'cv';
    protected $primaryKey = 'ID_CV';
    public $timestamps = false;
    protected $fillable = [
        'ID_USER',
        'TITRE_CV',
        'FICHIER',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'ID_USER');
    }
}
