@extends('layouts.template')

@php $evenements = \App\Models\evenement::all();
 $salles = \App\Models\salle::all();
@endphp


@section('content')

    <div class="container">

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


        <div class="flex h-screen bg-gray-100">
            <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
                <a href="{{ route('admin.dashboard') }}" class="text-black flex items-center space-x-2 px-4">
                    <i class="fas fa-school fa-2x"></i>
                    <span class="text-2xl font-extrabold">Admin Dashboard</span>
                </a>

                <nav>
                    <a href="{{ route('admin.user') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white">Gestion Utilisateurs</a>
                    <a href="{{ route('admin.gestionevent') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white">Gestion Événements</a>
                    <a href="{{ route('admin.gestionoffre') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white">Gestion des Offres</a>
                    <a href="{{ route('admin.gestiontype') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white">Gestion des types d'offres</a>

                </nav>
            </div>

            <div class="container mx-auto mt-8">
                <!-- Affichage des confirmations -->
                @if(session()->has('confirmation'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('confirmation') }}
                    </div>
                @endif

                <!-- Boutons d'ajout -->
                <div class="mb-4">

                    <h2 class="text-3xl font-bold mb-4">Gestion des Événements</h2>

                    <a href="{{ route('admin.createsalle') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer une Nouvelle Salle</a>
                    <a href="{{ route('admin.gestionsalle') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Voir les Salles</a>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Nom de l'Événement</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Heure</th>
                <th scope="col" class="px-6 py-3">Durée</th>
                <th scope="col" class="px-6 py-3">Salle Attribuée</th>
                <th scope="col" class="px-6 py-3">Organisateur</th>
                <th scope="col" class="px-6 py-3">Valide</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evenements as $evenement)
                @php
                    $organisateur = \App\Models\User::find($evenement->ref_users);
                @endphp
                <tr>
                    <td class="px-6 py-4">{{ $evenement->nom }}</td>
                    <td class="px-6 py-4">{{ $evenement->description }}</td>
                    <td class="px-6 py-4">{{ $evenement->date }}</td>
                    <td class="px-6 py-4">{{ $evenement->heure }}</td>
                    <td class="px-6 py-4">{{ $evenement->duree }}</td>
                    <td class="px-6 py-4">{{ $evenement->salle->nom ?? 'Non attribuée' }}</td>
                    <td class="px-6 py-4">{{ $organisateur->nom ?? 'Inconnu' }} {{ $organisateur->prenom ?? '' }}</td>
                    <td class="px-6 py-4">{{ $evenement->valide ? 'Oui' : 'Non' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.attribuerSalle', $evenement->id) }}">
                            @csrf
                            <select name="salle_id" class="form-control">
                                <option value="">Sélectionnez une salle</option>
                                @foreach($salles as $salle)
                                    <option value="{{ $salle->id }}">{{ $salle->nom }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-2 px-3 rounded">Attribuer Salle</button>
                        </form>

                        @if(!$evenement->valide)
                            <form action="{{ route('admin.validerEvenement', $evenement->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-2 bg-green-500 hover:bg-green-700 text-white font-bold text-sm py-2 px-3 rounded">Valider</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
