@extends("layouts.template")

@section("content")

    @php
    $users = \App\Models\User::all();
 @endphp

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

            <h2 class="text-3xl font-bold mb-4">Gestion des Utilisateurs</h2>

            <a href="{{ route('createuser') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajout Utilisateur</a>
            <a href="{{ route('createadmin') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajout Admin</a>
        </div>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('admin.searchuser') }}" class="mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" class="form-control mb-2" name="search" placeholder="Recherchez un utilisateur">
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="Admin" id="Admin">
                        <label class="form-check-label" for="Admin">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="Etudiant" id="Etudiant">
                        <label class="form-check-label" for="Etudiant">Etudiant</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="type[]" value="Entreprise" id="Entreprise">
                        <label class="form-check-label" for="Entreprise">Entreprise</label>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Tableau des utilisateurs -->
        <h4 class="text-lg font-semibold">Validation des Utilisateurs</h4>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nom</th>
                    <th scope="col" class="px-6 py-3">Prénom</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Rôle</th>
                    <th scope="col" class="px-6 py-3">Valide</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->nom }}</td>
                        <td class="px-6 py-4">{{ $user->prenom }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->role }}</td>
                        <td class="px-6 py-4 text-center">{{ $user->valide ? 'Oui' : 'Non' }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.valider_user', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-blue-600 hover:text-blue-800">Valider</button>
                            </form>

                            <form action="{{ route('admin.destroyuser', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                        </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
