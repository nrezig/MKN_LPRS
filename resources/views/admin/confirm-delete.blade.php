
@extends('layouts.app')

@section('content')
    <h2>Confirmation de suppression</h2>

    <p>Le type "{{ $type->libelle }}" est associé à des offres. Que souhaitez-vous faire?</p>

    <form action="{{ route('types.deleteOffers', $type->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Supprimer les offres associées</button>
    </form>

    <form action="{{ route('types.attributionnewtype', $type->id) }}" method="GET">
        <button type="submit">Attribuer un nouveau type aux offres</button>
    </form>

@endsection
