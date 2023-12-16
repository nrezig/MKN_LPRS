@extends('layouts.template')
@section('content')

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

        <div class="container">
        <br>
        <br>
          <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __("Créer une Salle") }}</div>
                        <form method="post" action="{{route('salle.store')}}">
                        @csrf
                        @method('post')

                            <br>
                            <div class="row mb-3">
                                <label for="nom" class="col-md-4 col-form-label text-md-end">Nom de la salle</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Le nom de votre salle" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="capacite" class="col-md-4 col-form-label text-md-end">Capacité</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="capacite" name="capacite" placeholder="Capacité" required>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="d-flex flex-row align-items-center justify-content-center w-100">
                                        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Valider</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>

@endsection
