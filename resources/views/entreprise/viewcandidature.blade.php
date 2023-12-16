{{-- resources/views/entreprise/viewcandidature.blade.php --}}
@extends("layouts.template")

@section("content")

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

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Candidatures pour l'Offre {{ $offreNom }}</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom de l'Étudiant</th>
                    <th scope="col" class="px-6 py-3">Prénom de l'Étudiant</th>
                    <th scope="col" class="px-6 py-3">Email de l'Étudiant</th>
                    <th scope="col" class="px-6 py-3">Domaine d'étude</th>
                </tr>
                </thead>
                <tbody>
                @foreach($candidatures as $candidature)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $candidature->etudiant->user->nom ?? 'Information non disponible' }}</td>
                        <td class="px-6 py-4">{{ $candidature->etudiant->user->prenom ?? 'Information non disponible' }}</td>
                        <td class="px-6 py-4">{{ $candidature->etudiant->user->email ?? 'Information non disponible' }}</td>
                        <td class="px-6 py-4">{{ $candidature->etudiant->domaine_etude ?? 'Information non disponible' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
