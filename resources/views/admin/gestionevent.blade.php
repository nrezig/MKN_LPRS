@extends('layouts.template')

@php $evenements = \App\Models\evenement::all();
 $salles = \App\Models\salle::all();
@endphp


@section('content')
    <div class="container">
        <h2>Gestion des Événements</h2>

        <a href="{{ route('admin.createsalle') }}" class="btn btn-success mb-3">Créer une Nouvelle Salle</a>
        <a href="{{ route('admin.gestionsalle') }}" class="btn btn-info mb-3">Voir les Salles</a>


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



        <table class="table">
            <thead>
            <tr>
                <th>Nom de l'Événement</th>
                <th>Description</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Durée</th>
                <th>Salle Attribuée</th>
                <th>Valide</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evenements as $evenement)
                <tr>
                    <td>{{ $evenement->nom }}</td>
                    <td>{{ $evenement->description }}</td>
                    <td>{{ $evenement->date }}</td>
                    <td>{{ $evenement->heure }}</td>
                    <td>{{ $evenement->duree }}</td>
                    <td>{{ $evenement->salle->nom ?? 'Non attribuée' }}</td>
                    <td>{{ $evenement->valide ? 'Oui' : 'Non' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.attribuerSalle', $evenement->id) }}">
                            @csrf
                            <select name="salle_id" class="form-control">
                                <option value="">Sélectionnez une salle</option>
                                @foreach($salles as $salle)
                                    <option value="{{ $salle->id }}">{{ $salle->nom }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Attribuer Salle</button>
                        </form>

                        @if(!$evenement->valide)
                            <form action="{{ route('admin.validerEvenement', $evenement->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success mt-2">Valider</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
