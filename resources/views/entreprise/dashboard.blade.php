@extends("layouts.template")

@section("title", "Dashboard Entreprise")

@section("content")
    @php
        $user = auth()->user();
        $prenomNom = $user ? $user->prenom . ' ' . $user->nom : 'Utilisateur';

        $repEntreprise = \App\Models\rep_entreprise::where('ref_user', auth()->id())->first();
        $entrepriseId = $repEntreprise ? $repEntreprise->ref_entreprise : null;

        if ($entrepriseId) {
            $offresPubliees = \App\Models\offre::where('ref_entreprise', $entrepriseId)->count();
            $candidaturesRecues = \App\Models\candidature::whereHas('offre', function ($query) use ($entrepriseId) {
                $query->where('ref_entreprise', $entrepriseId);
            })->count();
        } else {
            $offresPubliees = 0;
            $candidaturesRecues = 0;
        }
    @endphp

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="{{ route('entreprise.dashboard') }}" class="text-gray-700 flex items-center space-x-2 px-4">
                <span class="text-2xl font-bold">Menu Entreprise</span>
            </a>
            <nav>
                <a href="{{ route('entreprise.gestionoffre') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">Gérer les Offres</a>
                <!-- Remplacez 'x' par les noms réels de vos routes -->
            </nav>
        </div>

        <!-- Contenu Principal -->
        <div class="flex-1 overflow-y-auto">
            <div class="container mx-auto p-6">
                <h1 class="text-4xl font-semibold text-gray-800 mb-6">Bienvenue, {{ $prenomNom }}</h1>

                <!-- Statistiques et Informations -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Offres Publiées -->
                    <div class="bg-white p-4 shadow rounded-lg">
                        <h2 class="text-lg font-semibold">Offres Publiées</h2>
                        <p class="text-3xl">{{ $offresPubliees }}</p>
                    </div>

                    <!-- Candidatures Reçues -->
                    <div class="bg-white p-4 shadow rounded-lg">
                        <h2 class="text-lg font-semibold">Candidatures Reçues</h2>
                        <p class="text-3xl">{{ $candidaturesRecues }}</p>
                    </div>

                    <!-- Autres Statistiques -->
                    <!-- ... -->
                </div>

                <!-- Autres contenus et fonctionnalités spécifiques aux entreprises -->
                <!-- ... -->
            </div>
        </div>
    </div>
@endsection
