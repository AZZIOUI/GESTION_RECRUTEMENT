<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Offre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('nav')
    <div class="container mt-5">
        <h4 class="mb-4">Modifier l'Offre</h4>
        <form action="{{ route('offre-put', $offre->ID_OFFRE) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titre" class="form-label">Titre de l'Offre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ $offre->TITRE_OFFRE }}" required>
            </div>
            <div class="mb-3">
                <label for="entreprise" class="form-label">Entreprise</label>
                <input type="text" class="form-control" id="entreprise" name="entreprise" value="{{ $offre->ENTREPRISE }}" required>
            </div>
            <div class="mb-3">
                <label for="lieu" class="form-label">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" value="{{ $offre->LIEU }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $offre->DESCRIPTION }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
