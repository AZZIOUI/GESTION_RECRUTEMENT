<style>
    :root {
            --light: gray;
            --primary: #3d943e;
            --bg: #e1e1e1;
            --font: rgba(255, 255, 255, 0.767);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        * {
            transition: all 0.3s;
        }

        body {
            transition: 0.3s all;
            background: var(--bg);
            padding: 0;
            margin: 0;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        header a {
            text-decoration: none;
            color: var(--font);
        }

         header a:hover {
            color: white;
        }

        header  a:active {
            color: white;
        }

    header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--primary);
            color: var(--font);
            height: 4rem;
            border-bottom: 2px solid #e1e1e1;
            border-bottom-left-radius: 8px;
            padding-inline: 10px;
            border-bottom-right-radius: 8px;
            border-bottom: gray 0.2rem solid;

        }

        header .logo a {
            padding: 15px;
            margin: 0;
            font-size: 16px;
        }

        .nav a {
            padding-inline: 1rem;
            font-size: 14px;
        }

</style>

<header>
    <div class="logo">
        <a>ZED-JOBS</a>
    </div>
    <div class="nav">
        <a href="{{ route('home') }}" rel="noopener noreferrer">ACCUEIL</a>
        <a href="https://emsi.ma" target="_blank" rel="noopener noreferrer">EMSI</a>
        @if (Auth::guest())
            <a href="{{ route('login') }}">LOGIN</a>
            <a href="{{ route('inscription') }}">REGISTER</a>
        @elseif(Auth::check())
            @if (Auth::user()->TYPE == 'recruteur')
                <a href="{{ route('offres') }}">OFFRES</a>
            @elseif (Auth::user()->TYPE == 'candidat')
            <a href="{{ route('candidatures') }}">CANDIDATURES</a>
            @endif
            <a href="{{ route('profile') }}">PROFILE</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                LOGOUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>

</header>