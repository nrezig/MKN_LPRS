@extends('layouts.template')

@section('content')

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="{{ route('etudiant.dashboard') }}" class="text-black flex items-center space-x-2 px-4">
                <i class="fas fa-school fa-2x"></i>
                <span class="text-2xl font-extrabold">Étudiant Dashboard</span>
            </a>

            <nav>
                <a href="{{ route('etudiant.offres') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">Offres</a>
                <a href="{{ route('etudiant.evenement') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">Événements</a>
                <!-- Remplacez 'x' par les noms réels de vos routes -->
            </nav>
        </div>

    <div class="container">
        <div class="mb-4">
            <br>
            <h2 class="text-3xl font-bold mb-4">Offres disponibles</h2>
        </div>

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
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
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
                    <br>
                    <a href="{{ route('etudiant.detailoffre', ['id' => $offre->id]) }}" class="btn btn-primary">Voir les détails</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
