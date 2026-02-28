<?php

namespace App\Http\Controllers;
use App\Models\Offre;

use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function offres()  {
        $offres = Offre::with('utilisateur')->get();
        return view('candidat.accueil',compact('offres'));
    }

    public function offredetails($offreID) {
        $offres = Offre::with('utilisateur')->get();
        $offre = Offre::with('utilisateur')->findOrFail($offreID); 
        return view('candidat.offredetails', compact(['offres','offre']));
    }
}
