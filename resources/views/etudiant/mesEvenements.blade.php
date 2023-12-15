@extends('layouts.template')

@section('content')
    <div class="container">
        <h2>Mes Événements</h2>

        <a href="{{ route('etudiant.evenement') }}" class="btn btn-primary mb-3">Liste des événements disponibles</a>

        <table class="table">
            <thead>
            <tr>
                <th>Nom de l'événement</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evenements as $evenement)
                <tr>
                    <td>{{ $evenement->nom }}</td>
                    <td>{{ $evenement->description }}</td>
                    <td>
                        <form action="{{ route('etudiant.desinscrireEvenement', ['evenement' => $evenement->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Se désinscrire</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
