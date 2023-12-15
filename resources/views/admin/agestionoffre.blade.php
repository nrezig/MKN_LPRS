@extends("layouts.template")
@section("content")

    <div>
        @if(session()->has('confirmation'))
            <div>
                {{ session('confirmation') }}
            </div>
        @endif
    </div>



    <div class="mt-4 mb-4 text-right">
        <a href="{{ route('admin.acreateoffre') }}" class="inline-block px-4 py-2 text-white bg-blue-500 border rounded hover:bg-blue-600">
            Ajouter
        </a>
    </div>

    <div class="flex h-screen bg-gray-100">
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="#" class="text-black flex items-center space-x-2 px-4">
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

    @php
        $offres = \App\Models\offre::with(['type', 'entreprise'])->get();
        $types = \App\Models\type::all();
    @endphp

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg container mx-auto mt-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Titre</th>
                <th scope="col" class="px-6 py-3">Type</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Statut</th>
                <th scope="col" class="px-6 py-3">Valide</th>
                <th scope="col" class="px-6 py-3">Entreprise</th>
                <th scope="col" class="px-6 py-3">Modifier</th>
                <th scope="col" class="px-6 py-3">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offres as $offre)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $offre->id }}
                    </th>
                    <td class="px-6 py-4">{{ $offre->titre }}</td>
                    <td class="px-6 py-4">{{ $offre->type->libelle }}</td>
                    <td class="px-6 py-4">{{ $offre->description }}</td>
                    <td class="px-6 py-4">{{ $offre->etat }}</td>
                    <td class="px-6 py-4">
                        @if ($offre->type->valide == 1)
                            Valide
                        @else
                            Non
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($offre->entreprise) <!-- Modification ici -->
                        {{ $offre->entreprise->nom }}
                        @else
                            Pas d'entreprise
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.aeditoffre', ['offre' => $offre]) }}"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="post" action="{{ route('admin.offre.destroy', ['offre' => $offre]) }}">
                            @csrf
                            @method('delete')
                            <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit"
                                   value="Supprimer"/>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
