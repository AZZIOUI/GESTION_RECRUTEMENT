<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidatures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('nav')
    <div class="container mt-5">
        <h4 class="mb-4">Candidatures pour l'Offre: {{ $offre->TITRE_OFFRE }}</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom du Candidat</th>
                    <th>Prenom du Candidat</th>
                    <th>Date de Postulation</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                @if($candidatures == null)
                    <tr>
                        <td colspan="4" class="text-center">Aucune candidature disponible.</td>
                    </tr>
                @else
                @foreach ($candidatures as $candidature)
                <tr>
                    <td>{{ $candidature->utilisateur->NOM }} </td>
                    <td>{{ $candidature->utilisateur->PRENOM }}</td>
                    <td>{{ $candidature->DATE_POSTULATION }}</td>
                    
                    <td><a href="{{ route('candidature-show', ['candidature' => $candidature->ID_CANDIDATURE,'offre'=>$offre->ID_OFFRE]) }}" target="_blank">Postulation</a></td>
                </tr>
            @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
