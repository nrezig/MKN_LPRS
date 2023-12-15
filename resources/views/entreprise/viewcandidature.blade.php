{{-- resources/views/entreprise/viewcandidature.blade.php --}}
@extends("layouts.template")

@section("content")
    <div class="container mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Candidatures pour l'Offre {{ $offreNom }}</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
