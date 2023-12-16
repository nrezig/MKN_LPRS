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
                        <div class="card-header" style="font-family: 'MaPolice', sans-serif; font-size: 2em; font-weight: bold; color: #333;" >Confirmation de suppression</div>
                        <div class="card-body">
            <br>
            <p style="font-family: 'MaPolice', sans-serif; font-size: 1.5em; color: #666;" class="text-3xl font-bold mb-4">Le type "{{ $type->libelle }}" est associé à des offres. Que souhaitez-vous faire?</p>

            <form action="{{ route('types.deleteOffers', $type->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Supprimer les offres associées</button>
            </form>

            <form action="{{ route('types.attributionnewtype', $type->id) }} " method="GET">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Attribuer un nouveau type aux offres</button>
            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
