<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Offre extends Model
{
    use HasFactory;

    protected $table = 'offres';
    protected $primaryKey = 'ID_OFFRE';
    public $timestamps = false;
    protected $fillable = [
        'ID_USER',
        'TITRE_OFFRE',
        'ENTREPRISE',
        'DESCRIPTION',
        'LIEU',
        'DATE_PUB',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'ID_USER');
    }
    public function candidatures()
    {
        return $this->hasMany(Candidature::class, 'ID_OFFRE');
    }
}

