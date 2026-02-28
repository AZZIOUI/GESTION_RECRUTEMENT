<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Creation d'offre</title>
</head>
<body>
    @include('nav')
    <div class="container ms">
        <h4 class="text-center mb-4">Creer une Offre</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('offre-post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre de l'offre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre de l'offre" required>
                    </div>
                    <div class="mb-3">
                        <label for="entreprise" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Entrez le nom de l'entreprise" required>
                    </div>
                    <div class="mb-3">
                        <label for="lieu" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Entrez le lieu de travail" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Entrez la description de l'offre" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Creer l'offre</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>