@extends('layouts.template')

@section('content')
    <div class="container">
        <h2>Événements Disponibles</h2>

        <a href="{{ route('etudiant.mesEvenements') }}" class="btn btn-secondary mb-3">Mes événements</a>
        <a href="{{ route('evenement.create') }}" class="btn btn-primary mb-3">Créer un Événement</a>


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
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $evenement->nom }}</h3>
                    <p class="card-text">{{ $evenement->description }}</p>
                    <a href="{{ route('etudiant.detailEvenement', ['id' => $evenement->id]) }}" class="btn btn-primary">Voir les détails</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
