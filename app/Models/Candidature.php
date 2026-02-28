<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Offre;
use App\Models\CV;
use App\Models\Lettre;

class Candidature extends Model
{
    use HasFactory;

    protected $table = 'candidatures';
    protected $primaryKey = 'ID_CANDIDATURE';
    public $timestamps = false;
    protected $fillable = [
        'ID_OFFRE',
        'ID_CV',
        'ID_LETTRE',
        'ID_USER',
        'DATE_POSTULATION',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'ID_USER');
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class, 'ID_OFFRE');
    }

    public function cv()
    {
        return $this->belongsTo(CV::class, 'ID_CV');
    }

    public function lettre()
    {
        return $this->belongsTo(Lettre::class, 'ID_LETTRE');
    }
}
