<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('nav')
    <div class="container sm pt-2">
        <h4 class="mb-4">Liste des Offres</h4>
        <a href="{{ route('offre-create') }}" class="btn btn-success mb-3">Créer une Offre</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Titre de l'Offre</th>
                    <th>Entreprise</th>
                    <th>Lieu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offres as  $offre)
                    <tr>
                        <td>{{ $offre->TITRE_OFFRE }}</td>
                        <td>{{ $offre->ENTREPRISE }}</td>
                        <td>{{ $offre->LIEU }}</td>
                        <td>
                            <a href="{{ route('candidatures-recruteur', $offre->ID_OFFRE) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('offre-edit', $offre->ID_OFFRE) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('offre-delete', $offre->ID_OFFRE) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
