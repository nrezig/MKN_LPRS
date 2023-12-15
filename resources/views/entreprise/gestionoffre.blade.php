@extends("layouts.template")
@section("content")

    <div>
        @if(session()->has('confirmation'))
            <div>
                {{ session('confirmation') }}
            </div>
        @endif
    </div>

    @php
        $user = Auth::user();
        $offres = \App\Models\Offre::where('ref_entreprise', $user->rep_entreprise->ref_entreprise)->with('type')->get();
        $types = \App\Models\Type::all();
    @endphp

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg container mx-auto mt-8" >
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"  >
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    Ajouter
                </th>
                <th scope="col" class="px-6 py-3">
                    Modifier
                </th>
                <th scope="col" class="px-6 py-3">
                    Supprimer
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($offres as $offre)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                        <a href="{{ route('entreprise.viewcandidature', ['offre' => $offre->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir Candidatures</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('entreprise.createoffre') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ajouter</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('entreprise.editoffre', ['offre' => $offre]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="post" action="{{ route('entreprise.offre.destroy', ['offre' => $offre]) }}">
                            @csrf
                            @method('delete')
                            <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" value="Supprimer" />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
