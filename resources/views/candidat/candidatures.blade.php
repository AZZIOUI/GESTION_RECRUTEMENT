<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidatures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container my-5  ofrs">
        <div class="row justify-content-center">
            <div class="col-lg-15">
                <h4 class="text-center mb-2">Candidatures</h4>
                @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table ">
                            <thead class="table">
                                <tr>
                                    <th scope="col">Poste</th>
                                    <th scope="col">Recruteur</th>
                                    <th scope="col">Entreprise</th>
                                    <th scope="col">Date de postulation</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($candidatures as $candidature)
                                    <tr>
                                        <td>{{ $candidature->offre->TITRE_OFFRE }}</td>
                                        <td>{{ $candidature->offre->utilisateur->NOM }} {{ $candidature->offre->utilisateur->PRENOM }}</td>
                                        <td>{{ $candidature->offre->ENTREPRISE }}</td>
                                        <td>{{ $candidature->DATE_POSTULATION }}</td>
                                        <td>
                                            <a href="{{ route('candidature-edit', $candidature->ID_CANDIDATURE) }}" class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('candidature-delete', $candidature->ID_CANDIDATURE) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($candidatures->isEmpty())
                            <p class="text-center text-muted">Aucune candidature trouvée.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
