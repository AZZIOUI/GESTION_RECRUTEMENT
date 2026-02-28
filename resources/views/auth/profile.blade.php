<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    @include('nav')
    <div class="container mt-5">
        <h1 class="mb-4">Profile</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4>Nom complet: {{ $user->NOM }} {{ $user->PRENOM }}</h4>
                <h5>Email: {{ $user->EMAIL }}</h5>
                <h5>Fonction: {{ $user->TYPE }}</h5>
            </div>
        </div>

        <form action="{{ route('profile-post') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="TYPE" class="form-label">Changer votre Fonction</label>
                <select name="TYPE" id="TYPE" class="form-select" required>
                    <option value="candidat" {{ $user->TYPE == 'candidat' ? 'selected' : '' }}>Candidat</option>
                    <option value="recruteur" {{ $user->TYPE == 'recruteur' ? 'selected' : '' }}>Recruteur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Valider</button>
        </form>
    </div>
</body>
</html>
