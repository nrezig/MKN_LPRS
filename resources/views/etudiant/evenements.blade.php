@extends('layouts.template')

@section('content')

    <div class="container">
        <h2>Évenements Disponibles</h2>

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
            <h2 class="text-3xl font-bold mb-4">Événements Disponibles</h2>

            <a href="{{ route('etudiant.mesEvenements') }}" class="btn btn-secondary mb-3">Mes événements</a>
            <a href="{{ route('evenement.create') }}" class="btn btn-primary mb-3">Créer un Événement</a>
        </div>


        @php
            $evenements = \App\Models\Evenement::where('valide', true)->get();
        @endphp

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

        @foreach($evenements as $evenement)
            @php
                $organisateur = \App\Models\User::find($evenement->ref_users);
            @endphp
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title" style="font-size: 24px; font-weight: bold;">{{ $evenement->nom }}</h3>
                    <p class="card-text">{{ $evenement->description }}</p>
                    <p class="card-text">Organisé par : <span style="font-size: 12px;">{{ $organisateur->prenom }} {{ $organisateur->nom }}</span></p>
                    <br>
                    <a href="{{ route('etudiant.detailEvenement', ['id' => $evenement->id]) }}" class="btn btn-primary">Voir les détails</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
