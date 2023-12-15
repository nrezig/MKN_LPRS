@extends("layouts.template")

@section("title", "Dashboard Administrateur")

@section("content")

    @php
        $studentsCount = \App\Models\Etudiant::count();
        $companiesCount = \App\Models\Entreprise::count();
        $eventsCount = \App\Models\Evenement::count();
        $jobOffersCount = \App\Models\Offre::count();

        $user = auth()->user();
    @endphp

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
        <div>

            <div class="flex-1 overflow-y-auto pl-100">
                <div class="bg-white p-4 shadow mb-4">
                    <h2 class="text-xl text-gray-800 font-bold">Bienvenue, {{ $user->prenom }} {{ $user->nom }}!</h2>
                </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white border rounded-lg p-4 shadow">
                <div class="text-primary text-xs font-weight-bold text-uppercase mb-1">Étudiants Inscrits</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $studentsCount }}</div>
            </div>

            <div class="bg-white border rounded-lg p-4 shadow">
                <div class="text-success text-xs font-weight-bold text-uppercase mb-1">Entreprises Partenaires</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $companiesCount }}</div>
            </div>

            <div class="bg-white border rounded-lg p-4 shadow">
                <div class="text-info text-xs font-weight-bold text-uppercase mb-1">Événements Planifiés</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $eventsCount }}</div>
            </div>

            <div class="bg-white border rounded-lg p-4 shadow">
                <div class="text-warning text-xs font-weight-bold text-uppercase mb-1">Offres d'Emploi</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jobOffersCount }}</div>
            </div>
        </div>
    </div>
    </div>



@endsection
