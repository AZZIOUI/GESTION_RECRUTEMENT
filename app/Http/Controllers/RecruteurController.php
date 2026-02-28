<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;


class RecruteurController extends Controller
{
    public function index() {
        $recruteur = Auth::user();
        $offres = Offre::all();
        return view('recruteur.accueil', compact('recruteur', 'offres'));
    }

    public function offres() {
        $recruteur = Auth::user();
        $offres = Offre::where('ID_USER', $recruteur->ID_USER)->get();
        return view('recruteur.offres', compact('recruteur', 'offres'));
    }

    public function candidatures($offre) {
        $recruteur = Auth::user();
        $offre = Offre::with('candidatures')->find($offre);
        $candidatures = Candidature::where('ID_OFFRE', $offre->ID_OFFRE)->get();
        return view('recruteur.candidatures', compact('recruteur', 'offre', 'candidatures'));
    }
public function candidatureshow($offre,$candidature){
        
        $recruteur = Auth::user();
        $candidature = Candidature::find($candidature);
        $offreo = Offre::find($offre);
        
        return view('recruteur.candidatureshow', compact('recruteur', 'candidature','offreo'));
}
    public function offrecreate() {
        $recruteur = Auth::user();
        return view('recruteur.offrecreate', compact('recruteur'));
    }

    public function offrepost(Request $request) {
        $recruteur = Auth::user();
        $request->validate([
            'titre' => 'required|string',
            'entreprise' => 'required|string',
            'lieu' => 'required|string',
            'description' => 'required|string',
        ]);

        $offre = Offre::create([
            'ID_USER' => $recruteur->ID_USER,
            'TITRE_OFFRE' => $request->input('titre'),
            'ENTREPRISE' => $request->input('entreprise'),
            'DESCRIPTION' => $request->input('description'),
            'LIEU' => $request->input('lieu'),
            'DATE_PUB' => now(),
        ]);

        return redirect()->route('offres')->with('success', 'Votre offre a ete creee avec succes.');
    }

    public function offreedit(Offre $offre) {
        $recruteur = Auth::user();
        return view('recruteur.offreedit', compact('recruteur', 'offre'));
    }

    public function offreput(Request $request,$offre) {
        $request->validate([
            'titre' => 'required|string',
            'entreprise' => 'required|string',
            'lieu' => 'required|string',
            'description' => 'required|string',
        ]);
    
        $offre = Offre::findOrFail($offre);
        $offre->update([
            'TITRE_OFFRE' => $request->input('titre'),
            'ENTREPRISE' => $request->input('entreprise'),
            'DESCRIPTION' => $request->input('description'),
            'LIEU' => $request->input('lieu'),
        ]);

        return redirect()->route('offres')->with('success', 'Votre offre a ete modifiee avec succes.');
    }

    public function offredelete(Offre $offre) {
        $recruteur = Auth::user();
        $offre->delete();
        return redirect()->route('offres')->with('success', 'Votre offre a ete supprimee avec succes.');
    }


}
