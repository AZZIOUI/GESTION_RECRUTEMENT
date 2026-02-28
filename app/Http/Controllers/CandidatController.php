<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Candidature;
use App\Models\CV;
use App\Models\Lettre;


class CandidatController extends Controller
{
    public function index() {
        $candidat = Auth::user();
        $offres = Offre::with('utilisateur')->get();
        return view('candidat.accueil', compact('candidat', 'offres'));
    }

    public function postuler(Request $request) {
        $candidat = Auth::user();
        $offre = Offre::find($request->input('offre'));

        $existingCandidature = Candidature::where('ID_USER', $candidat->ID_USER)
                                          ->where('ID_OFFRE', $offre->ID_OFFRE)
                                          ->first();

        if ($existingCandidature) {
            return redirect()->route('candidat-home')->with('error', 'Vous avez déjà postulé pour cette offre.');
        }
        $request->validate([
            'titrecv' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'titrelettre' => 'required|string|max:255',
            'lm' => 'required|string',
        ]);
    
        $cvFileName = $offre->ID_OFFRE . '-' . $candidat->ID_USER . '.' . $request->file('cv')->getClientOriginalExtension();
        $cvPath = $request->file('cv')->storeAs('cvs', $cvFileName, 'public');

        $cv = CV::create([
            'ID_USER' => $candidat->ID_USER,
            'TITRE_CV' => $request->input('titrecv'),
            'FICHIER' => $cvPath,
        ]);
        $lettre = Lettre::create([
            'ID_USER' => $candidat->ID_USER,
            'TITRE_LETTRE' => $request->input('titrelettre'),
            'CONTENU' => $request->input('lm'),
        ]);

        $candidature = Candidature::create([
            'ID_OFFRE' => $offre->ID_OFFRE,
            'ID_CV' => $cv->ID_CV,
            'ID_LETTRE' => $lettre->ID_LETTRE,
            'ID_USER' => $candidat->ID_USER,
            'DATE_POSTULATION' => now(),
        ]);
    
        return redirect()->route('candidat-home')->with('success', 'Votre candidature a ete envoyee avec succes.');
    
    }

    public function candidatures()
{
    $candidat = Auth::user();
    $candidatures = Candidature::with(['offre.utilisateur'])->where('ID_USER', $candidat->ID_USER)->get();

    foreach ($candidatures as $candidature) {
        logger($candidature->toArray());
    }

    return view('candidat.candidatures', compact('candidatures'));
}


    public function candidatureedit($candidature){
        $candidat = Auth::user();
        $candidature = Candidature::with(['utilisateur','offre','cv','lettre'])->where('ID_CANDIDATURE', $candidature)->first();
        $offre = $candidature->offre;
        return view('candidat.candidatureedit', compact('candidature','candidat','offre'));     
    }

    public function candidatureput(Request $request)
{
    $candidat = Auth::user();
    $candidature = Candidature::with(['cv', 'lettre', 'offre'])->findOrFail($request->input('ID_CANDIDATURE'));

    $request->validate([
        'titrecv' => 'required|string|max:255',
        'cv' => 'file|mimes:pdf,doc,docx|max:2048',
        'titrelettre' => 'required|string|max:255',
        'lm' => 'required|string',
    ]);

    if ($request->hasFile('cv')) {
        $cvFileName = $candidature->offre->ID_OFFRE . '-' . $candidat->ID_USER . '.' . $request->file('cv')->getClientOriginalExtension();
        $cvPath = $request->file('cv')->storeAs('cvs', $cvFileName, 'public');

        $candidature->cv->update([
            'TITRE_CV' => $request->input('titrecv'),
            'FICHIER' => $cvPath,
        ]);
    } 
    if ($candidature->lettre) {
        $candidature->lettre->update([
            'TITRE_LETTRE' => $request->input('titrelettre'),
            'CONTENU' => $request->input('lm'),
        ]);
    }

    return redirect()->route('candidat-home')->with('success', 'Votre candidature a été modifiée avec succès.');
}


    public function candidaturedelete($candidature){
        $candidature = Candidature::find($candidature);
        
        if ($candidature->cv && \Storage::disk('public')->exists($candidature->cv->FICHIER)) {
            \Storage::disk('public')->delete($candidature->cv->FICHIER);
        }

        $candidature->cv->delete();
        $candidature->lettre->delete();
        
        $candidature->delete();
        return redirect()->route('candidatures')->with('success', 'Votre candidature a ete supprimee avec succes.');
    }
}