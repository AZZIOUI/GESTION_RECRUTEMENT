<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidature</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .ofrs {
            height: 85vh;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .ofrs::-webkit-scrollbar {
            width: 2px;
        }

        .ofrs::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .ofrs::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container ofrs mt-5 ">
        <div class="row">
            <div class="col-md-6 mb-4">
                @include('offrecard')
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5>Modifier la Candidature</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('candidature-put') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="ID_CANDIDATURE" value="{{ $candidature->ID_CANDIDATURE }}">
                            <div class="form-group">
                                <label for="titrecv">CV:</label>
                                <input type="text" name="titrecv" id="cv" class="form-control" value="{{$candidature->cv->TITRE_CV}}" required>
                                <input type="file" class="form-control-file" id="cv" name="cv">
                                @if ($candidature->cv)
                                    <iframe src="{{ asset('storage/' . $candidature->cv->FICHIER) }}" width="100%" height="200px"></iframe>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lettre">Lettre de motivation:</label>
                                <input type="text" name="titrelettre" id="lettre" class="form-control" value="{{$candidature->lettre->TITRE_LETTRE}}" required>
                                <textarea name="lm" id="lm" cols="30" rows="10" class="form-control"  required>{{$candidature->lettre->CONTENU}}</textarea>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
