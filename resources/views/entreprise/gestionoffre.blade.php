@extends("layouts.template")
@section("content")

    @php
        $user = Auth::user();
        $offres = \App\Models\Offre::where('ref_entreprise', $user->rep_entreprise->ref_entreprise)->with('type')->get();
        $types = \App\Models\Type::all();
    @endphp

    <div class="flex h-screen bg-gray-100">
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="{{ route('entreprise.dashboard') }}" class="text-black flex items-center space-x-2 px-4">
                <i class="fas fa-school fa-2x"></i>
                <span class="text-2xl font-extrabold">Menu Entreprise</span>
            </a>

            <nav>
                <a href="{{ route('entreprise.gestionoffre') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white">Gérer les Offres</a>
                <!-- Remplacez 'x' par les noms réels de vos routes -->

            </nav>
        </div>

        <div class="container mx-auto mt-8">
            <!-- Affichage des confirmations -->
            @if(session()->has('confirmation'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('confirmation') }}
                </div>
            @endif

            <div class="mb-4">

                <h2 class="text-3xl font-bold mb-4">Gestion des Offres</h2>

                <a href="{{ route('entreprise.createoffre') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une offre</a>
            </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Statut
                </th>
                <th scope="col" class="px-6 py-3">
                    Valide
                </th>
                <th scope="col" class="px-6 py-3">
                    Candidatures
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($offres as $offre)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th class="px-6 py-4">
                        {{ $offre->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $offre->titre }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offre->type->libelle }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offre->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offre->etat }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($offre->type->valide == 1)
                            Valide
                        @else
                            Non
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('entreprise.viewcandidature', ['offre' => $offre->id]) }}" class="font-medium text-blue-600 dark:text-green-500 hover:underline">Voir Candidatures</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('entreprise.editoffre', ['offre' => $offre]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>

                        <form method="post" action="{{ route('entreprise.offre.destroy', ['offre' => $offre]) }}">
                            @csrf
                            @method('delete')
                            <input class="font-medium text-blue-600 dark:text-red-500 hover:underline" type="submit" value="Supprimer" />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
