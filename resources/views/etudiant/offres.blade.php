<!-- resources/views/etudiant/offres.blade.php -->
@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des offres</title>
    <!-- Ajoutez ici les liens vers vos fichiers CSS et JS, le cas échéant -->
</head>
<body>

<div class="container">
    <h2>Offres disponibles</h2>

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

    @foreach($offre as $offre)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">{{ $offre->titre }}</h3>
                <p class="card-text">{{ $offre->description }}</p>
                <a href="{{ route('etudiant.detailoffre', ['id' => $offre->id]) }}" class="btn btn-primary">Voir les détails</a>

            </div>
        </div>
    @endforeach
</div>

<!-- Ajoutez ici vos scripts JS, le cas échéant -->
</body>
</html>
@endsection
