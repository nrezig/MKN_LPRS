@extends("layouts.template")

@section("content")

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="{{ route('etudiant.dashboard') }}" class="text-black flex items-center space-x-2 px-4">
                <i class="fas fa-school fa-2x"></i>
                <span class="text-2xl font-extrabold">Étudiant Dashboard</span>
            </a>

            <nav>
                <a href="{{ route('etudiant.offres') }}" class="block py-2.5 px-4 rounded hover:bg-blue-200">Offres</a>
                <a href="{{ route('etudiant.evenement') }}" class="block py-2.5 px-4 rounded hover:bg-blue-200">Événements</a>
            </nav>
        </div>


        <div class="container">
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Créer un Événement</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('etudiant.storeEvenement') }}">
                                @csrf
                                @method('post')
                                <div class="row mb-3">
                                    <label for="nom_eve" class="col-md-4 col-form-label text-md-end">Nom de l'evenement</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="nom_eve" name="nom" placeholder="Nom de votre Entreprise" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="desc" class="col-md-4 col-form-label text-md-end">Description</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="date" class="col-md-4 col-form-label text-md-end">Date</label>
                                    <div class="col-md-6">
                                        <input type="Date" class="form-control" id="date" name="date" placeholder="Date" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="heure" class="col-md-4 col-form-label text-md-end">Heure</label>
                                    <div class="col-md-6">
                                        <input type="time" class="form-control" id="heure" name="heure" placeholder="Heure" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="duree" class="col-md-4 col-form-label text-md-end">Durée</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="duree" name="duree" placeholder="Durée" pattern="[0-23]{2}:[0-60]{2}" required>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="d-flex flex-row align-items-center justify-content-center w-100">
                                            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection



