@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $offre->titre }}</h3>

                <h5 class="card-subtitle mb-2 text-muted">Description du poste</h5>
                <p class="card-text">{{ $offre->description }}</p>

                <h5 class="card-subtitle mb-2 text-muted">Type du contrat</h5>
                <p class="card-text">{{ $offre->type->libelle }}</p>

                <h5 class="card-subtitle mb-2 text-muted">En savoir plus sur {{ $offre->entreprise->nom }}</h5>
                <p class="card-text">{{ $offre->entreprise->description }}</p>
                <p class="card-text">Adresse: {{ $offre->entreprise->adresse }}</p>

                <form method="POST" action="{{ route('etudiant.candidater', ['offre' => $offre->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-success">Candidater</button>
                    <a href="{{ route('etudiant.offres') }}" class="btn">Retour</a>
                </form>
            </div>
        </div>
    </div>
@endsection
