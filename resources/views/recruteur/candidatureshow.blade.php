<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails de la Candidature</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .ofrs {
            height: 83vh;
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
    <div class="container ofrs mt-5">
        <h4 class="mb-4">Détails de la Candidature pour l'Offre: {{ $offreo->TITRE_OFFRE }}</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5>CV</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Titre:</strong> {{ $candidature->cv->TITRE_CV }}</p>
                        <p><strong>Fichier:</strong></p>
                        <iframe src="{{ asset('storage/' . $candidature->cv->FICHIER) }}" width="100%" height="777px"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5>Lettre de Motivation</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Titre:</strong> {{ $candidature->lettre->TITRE_LETTRE }}</p>
                        <p><strong>Contenu:</strong></p>
                        <div class="border ofrs p-3" style="background-color: #f9f9f9; white-space: pre-wrap;height:777px;">
                            {{ $candidature->lettre->CONTENU }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
