<!-- resources/views/etudiant/detail_offre.blade.php -->
@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'offre</title>
    <!-- Ajoutez ici les liens vers vos fichiers CSS et JS, le cas échéant -->
</head>
<body>

<div class="container">
    <h2>Détails de l'offre</h2>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $offre->titre }}</h3>
            <p class="card-text">{{ $offre->description }}</p>

            <!-- Autres détails de l'offre, le cas échéant -->

            <form method="POST" action="{{ route('etudiant.candidater', ['offre' => $offre->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">Candidater</button>
            </form>
        </div>
    </div>
</div>

<!-- Ajoutez ici vos scripts JS, le cas échéant -->
</body>
</html>
@endsection
