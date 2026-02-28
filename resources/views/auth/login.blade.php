<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        .ps,
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

        #tx,
        #ty {
            font-size: 14px;
            border-radius: 5px;
            outline: none;
            border: 1px solid #ddd;
            width: 250px;
            height: 35px;
            padding: 5px;
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
    <title>ZedJobs Auth</title>
</head>

<body>
    <div class="card">
        <h6 class="card-header text-center text-white">Connexion</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login-post') }}" method="POST">
            @csrf
            <div class="card-body" id="cardb">
                <br>
                <div class="ml">
                    <label for="tx" class="form-label ">Utilisateur :</label>
                    <input type="text" id="tx" name="EMAIL" class="form-control" placeholder="Utilisateur"
                        required value="{{ old('EMAIL') }}">
                </div>
                <div class="ps">
                    <label for="ty" class="form-label ">Mot de passe :</label>
                    <input type="password" id="ty" name="password" class="form-control"
                        placeholder="Mot de Passe" required>
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                </div>
                <br>
                <button type="submit" name="valider" class="btn btn-success">Connexion</button><br>
                <p class="text-center">
                    Pas encore inscrit ? <a href="{{ route('inscription') }}" class="text-primary">Créer un compte</a>
                </p>

                <p class="text-center text-primary">ZED-JOBS</p>
            </div>
        </form>
    </div>
</body>

</html>
