
@extends('layouts.app')

@section('content')
    <h2>Ajouter un Type</h2>

    <!-- Formulaire de création -->
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <!-- Ajoutez ici les champs nécessaires pour la création d'un type -->
        <label for="libelle">Libellé:</label>
        <input type="text" name="libelle" required>

        <label for="valide">Valide:</label>
        <input type="checkbox" name="valide" value="1">

        <button type="submit">Ajouter</button>
    </form>
@endsection
