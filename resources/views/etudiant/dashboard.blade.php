@extends('layouts.template')

@section('title', 'Tableau de Bord - Étudiant')

@section('content')
    @php

         $userId = auth()->user()->id;

         // Récupérer l'ID de l'étudiant associé à l'utilisateur connecté
         $etudiant = \App\Models\Etudiant::where('ref_user', $userId)->first();
         $etudiantId = $etudiant ? $etudiant->id : null;

         $nombreInscriptions = 0;
         $nombreCandidatures = 0;

         if ($etudiantId) {
             $nombreInscriptions = \App\Models\Inscription::where('ref_etudiant', $etudiantId)->count();
             $nombreCandidatures = \App\Models\Candidature::where('ref_etudiant', $etudiantId)->count();
         }

    @endphp

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <nav>
                <a href="{{ route('etudiant.offres') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">Offres</a>
                <a href="{{ route('etudiant.evenement') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">Événements</a>
                <!-- Remplacez 'x' par les noms réels de vos routes -->
            </nav>
        </div>

        <!-- Contenu Principal -->
        <div class="flex-1 overflow-y-auto">
            <div class="container mx-auto p-6">
                <h1 class="text-4xl font-semibold text-gray-800 mb-6">Tableau de Bord Étudiant</h1>

                <!-- Statistiques -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Événements Inscrits -->
                    <div class="bg-white p-4 shadow rounded-lg">
                        <h2 class="text-lg font-semibold">Événements Inscrits</h2>
                        <p class="text-3xl">{{ $nombreInscriptions }}</p>
                    </div>

                    <!-- Offres Postulées -->
                    <div class="bg-white p-4 shadow rounded-lg">
                        <h2 class="text-lg font-semibold">Offres Postulées</h2>
                        <p class="text-3xl">{{ $nombreCandidatures }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
