@extends('layouts.template')

@section('content')

@php
    $types = \App\Models\Type::all();
@endphp

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif


    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

                <h2 class="text-3xl font-bold mb-4">Gestion des Types d'offres</h2>

                <a href="{{ route('types.create') }}" class="btn btn-primary">Ajouter un type</a>
            </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">Libelle</th>
            <th scope="col" class="px-6 py-3">Valide</th>
            <th scope="col" class="px-6 py-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($types as $type)
            <tr>
                <td class="px-6 py-4">{{ $type->libelle }}</td>
                <td class="px-6 py-4">{{ $type->valide }}</td>
                <td class="px-6 py-4">
                    @if ($type->valide == 0)
                    <form action="{{ route('types.valider', $type->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-blue-600 hover:text-blue-800">Valider</button>
                    </form>
                    @else
                        <span class="text-green-600 hover:text-green-800">Validé |</span>
                    @endif

                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display: inline;" onsubmit="return handleDelete(event, {{ $type->id }});">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">| Supprimer</button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Aucun type trouvé.</td>
            </tr>
        @endforelse
        </tbody>
    </table>


@endsection
