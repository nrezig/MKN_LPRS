@extends('layouts.template')

@section('content')

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="{{ route('etudiant.dashboard') }}" class="text-black flex items-center space-x-2 px-4">
                <i class="fas fa-school fa-2x"></i>
                <span class="text-2xl font-extrabold">Étudiant Dashboard</span>
            </a>

            <nav>
                <a href="{{ route('etudiant.offres') }}" class="block py-2.5 px-4 rounded hover:bg-blue-200">Offres</a>
                <a href="{{ route('etudiant.evenement') }}" class="block py-2.5 px-4 rounded hover:bg-blue-200">Événements</a>
                <!-- Remplacez 'x' par les noms réels de vos routes -->
            </nav>
        </div>

        <div class="container mx-auto mt-8">

        <div class="mb-4">
            <h2 class="text-3xl font-bold mb-4">Mes Événements</h2>

            <a href="{{ route('etudiant.evenement') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Liste des événements disponibles</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Nom de l'événement</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evenements as $evenement)
                <tr>
                    <td class="px-6 py-4">{{ $evenement->nom }}</td>
                    <td class="px-6 py-4">{{ $evenement->description }}</td>
                    <td  class="px-6 py-4">
                        <form action="{{ route('etudiant.desinscrireEvenement', ['evenement' => $evenement->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Se désinscrire</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        </div>
@endsection
