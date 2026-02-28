@extends('candidat.accueil')
@section('ofrdtls')

@include('offrecard')
@if(Auth::check() && Auth::user()->TYPE == 'candidat')
            <div class="card">
                <div class="card-header text-white ttr">
                    <h4>Postuler</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('postuler')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="offre" value="{{ $offre->ID_OFFRE }}">
                        <div class="form-group">
                            <label for="titrecv">CV:</label>
                            <input type="text" name="titrecv" id="cv" class="form-control" placeholder="Titre de CV.." required>
                            <input type="file" name="cv" id="cv" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <label for="lettre">Lettre de motivation:</label>
                            <input type="text" name="titrelettre" id="lettre" class="form-control" placeholder="Titre de lettre de motivation.." required>
                            <textarea name="lm" id="lm" cols="30" rows="10" class="form-control" required></textarea>
                        </div><br>
                        <button type="submit" class="btn btn-success">Postuler</button>
                    </form>
                </div>
            </div>
        @elseif(!(Auth::check()) )
            <div class="alert alert-warning" role="alert">
                Vous devez être connecté pour postuler.
            </div>
        @endif
    
@endsection