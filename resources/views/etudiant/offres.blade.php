@extends('layouts.template')

@section('content')
    <div class="container">
        <h2>Offres disponibles</h2>

        <form method="GET" action="{{ route('etudiant.offres') }}" class="mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" class="form-control mb-2" name="search" placeholder="Recherchez une offre">
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="CDD" id="cdd">
                        <label class="form-check-label" for="cdd">CDD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="CDI" id="cdi">
                        <label class="form-check-label" for="cdi">CDI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="Alternance" id="alternance">
                        <label class="form-check-label" for="alternance">Alternance</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="Stage" id="stage">
                        <label class="form-check-label" for="stage">Stage</label>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Affichage des messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Liste des offres -->
        @foreach($offres as $offre)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $offre->titre }} - <small>{{ $offre->type->libelle }}</small>
                    </h3>
                    <p class="text-muted" style="font-size: smaller;">
                        Publiée par {{ $offre->entreprise->nom }}
                    </p>
                    <a href="{{ route('etudiant.detailoffre', ['id' => $offre->id]) }}" class="btn btn-primary">Voir les détails</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
