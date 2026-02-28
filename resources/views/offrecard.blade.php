<style>
    .ttr{
        background-color: var(--primary);
    }
    .desc{
        white-space: pre-wrap;
    }
    </style>
    
    <div class="card shadow-sm mb-4">
        <div class="card-header text-white ttr">
            <h5 class="mb-0">{{ $offre->TITRE_OFFRE }}</h5>
        </div>
        <div class="card-body">
            <pre class="mb-3">
                <span class="text-secondary">Entreprise:</span> <b>{{ $offre->ENTREPRISE }}</b>
                <span class="text-secondary">Lieu:</span> {{ $offre->LIEU }}
                <span class="text-secondary">Publié le:</span> {{ $offre->DATE_PUB }}
            </pre>
            <small class="text-justify">
                <span class="text-secondary">Description:</span> 
                <pre class="desc">{{ $offre->DESCRIPTION }}</pre>
            </small>
            <h6 class="mt-4 text-muted">
                ~ {{ $offre->utilisateur->NOM }} {{ $offre->utilisateur->PRENOM }} 
            </h6>
        </div>
    </div>
    
        
        