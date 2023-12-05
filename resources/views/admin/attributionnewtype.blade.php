@extends('layouts.app')

@section('content')
    <h2>Attribuer un nouveau type aux offres</h2>

    <p>Le type "{{ $type->libelle }}" est associé à des offres. Il y a actuellement {{ $type->offres->count() }} offre(s) associée(s). Veuillez sélectionner le nouveau type pour ces offres.</p>

    @php
        // Définir directement les types disponibles
        $typesDisponibles = App\Models\Type::where('valide', true)->get();
    @endphp

    <form action="{{ route('types.process-attributionnewtype', $type->id) }}" method="POST">
        @csrf

        <!-- Ajoutez ici les champs nécessaires pour la sélection du nouveau type -->
        <label for="nouveauType">Nouveau Type:</label>
        <select name="nouveauType" required>
            <!-- Liste des types disponibles -->
            @foreach($typesDisponibles as $typeDisponible)
                <option value="{{ $typeDisponible->id }}">{{ $typeDisponible->libelle }}</option>
            @endforeach
        </select>

        <button type="submit">Valider</button>
    </form>
@endsection
