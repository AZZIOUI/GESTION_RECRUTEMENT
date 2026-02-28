<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <style>
        :root {
            --light: gray;
            --primary: #3d943e;
            --bg: #e1e1e1;
            --font: rgba(255, 255, 255, 0.767);
        }

        * {
            transition: all 0.3s;
        }

        body {
            background-color: var(--bg);
            background-size: cover;
            background-repeat: no-repeat;
            padding: 0%;
            margin: 0%;
        }

        .card {
            width: 40%;
            height: fit-content;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .card-header {
            background-color: var(--primary);
        }

        #cardb,
        .ml {
            display: flex;
            flex-direction: column;
        }

        form {
            font-size: 14px;
            align-self: center;
        }

        .ml {
            margin-bottom: 5px;
        }

        

        button {
            width: 50%;
            height: 35px;
            border-radius: 10px;
            align-self: center;
        }

        button:active {
            scale: 0.9;
        }

        @media (max-width: 650px) {
            .card {
                width: 90%;
            }
        }
    </style>
    <title>ZedJobs Inscription</title>
</head>

<body>
    <div class="card">
        <h6 class="card-header text-center text-white">Inscription</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('inscription-post') }}" method="POST">
            @csrf
            <div class="card-body" id="cardb">
                <br>
                <div class="ml">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" id="nom" name="NOM" class="form-control" placeholder="Nom" required
                        value="{{ old('NOM') }}">
                </div>
                <div class="ml">
                    <label for="prenom" class="form-label">Prenom :</label>
                    <input type="text" id="prenom" name="PRENOM" class="form-control" placeholder="Prenom" required
                        value="{{ old('PRENOM') }}">
                </div>
                <div class="ml">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" id="email" name="EMAIL" class="form-control" placeholder="Email" required
                        value="{{ old('EMAIL') }}">
                </div>
               
                <div class="ml">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de Passe"
                        required>
                </div>
                
                <div class="ml">
                    <label for="type" class="form-label">Vous êtes ? :</label>
                    <select id="type" name="TYPE" class="form-select" required>
                        <option value="candidat" {{ old('type') == 'candidat' ? 'selected' : '' }}>Candidat</option>
                        <option value="recruteur" {{ old('type') == 'recruteur' ? 'selected' : '' }}>Recruteur</option>
                    </select>
                </div>
                <br>
                <button type="submit" name="valider" class="btn btn-success">S'inscrire</button><br>
                <p class="text-center">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-primary">Connectez-vous</a>
                </p>
                <p class="text-center text-primary">ZED-JOBS</p>
                
            </div>
        </form>
    </div>
</body>

</html>
