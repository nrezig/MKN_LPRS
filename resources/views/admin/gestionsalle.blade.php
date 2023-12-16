@extends("layouts.template")

@section("content")

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

    <div class="mb-4">
        <h2 class="text-3xl font-bold mb-4">Gestion des Salles</h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">Nom</th>
            <th scope="col" class="px-6 py-3">Capacité</th>
            <th scope="col" class="px-6 py-3">Actions</th>
        </tr>
        @foreach($salle as $salle)
            <tr>
                <td class="px-6 py-4">{{ $salle->nom }}</td>
                <td class="px-6 py-4">{{ $salle->capacite }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('admin.editsalle', ['salle' => $salle->id]) }}" method="POST">
                    </form>

                    <form action="{{route('salle.destroy', ['salle' => $salle])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
    </div>

@endsection
