<style>
        
        
    .card {
        width: 100%;
        height: fit-content;
        display: flex;
        flex-direction: column;

    }

    .card a {
        color: rgb(57, 122, 196);
        text-decoration: underline;
    }

    .ofrs {
        padding: 10px;
        margin: 10px;
    }

    .ofrs {
        height: 88vh;
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
    
<div class="col-4 ofrs ">
    <input type="search" name="search" id="search" class="form-control" placeholder="Rechercher.."><br>
    @foreach ($offres as $offre)
        <div class="card p-2 item">
            <a href="{{ route('offre-details', ['offre' => $offre->ID_OFFRE]) }}">
                <h6>{{ $offre->TITRE_OFFRE }}</h6>
            </a>

            <small>Entreprise: <b>{{ $offre->ENTREPRISE }}</b></small>
            <small>Lieu: {{ $offre->LIEU }}</small>
            <small>~ {{ $offre->utilisateur->NOM }} {{ $offre->utilisateur->PRENOM }} - Publié le :
                {{ $offre->DATE_PUB }}</small>
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".ofrs .item").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>