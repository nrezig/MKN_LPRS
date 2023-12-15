@extends('layouts.app')
@section('content')

    @php         $entreprise = \App\Models\entreprise::all();
    @endphp
    @viteReactRefresh
    @vite(['resources/js/Register.js'])
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <form method="POST" action="{{ route('createuser') }}">

                    <div class="card-body">
                            @csrf
                            <div class="row mb-3">
                                <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>
                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Passe') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmation du Mot de Passe') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Choix du rôle -->
                            <div class="d-flex flex-row align-items-center justify-content-center w-100 mb-3">
                                <label> Étudiant : <input class="me-5" name="role" type="radio" id="student" value="Etudiant" onchange="toggleForm()"> </label>
                                <label> Entreprise : <input name="role" type="radio" id="company" value="Entreprise" onchange="toggleForm()"> </label>
                            </div>

                            <!-- Formulaire étudiant -->
                            <div id="student_form" style="display: none;">
                                <div class="row mb-3">
                                    <label for="dom_etude" class="col-md-4 col-form-label text-md-end">{{ __("Domaine d'étude") }}</label>
                                    <div class="col-md-6">
                                        <input id="dom_etude" type="text" class="form-control @error('dom_etude') is-invalid @enderror" name="dom_etude" value="{{ old('dom_etude') }}" autocomplete="dom_etude" autofocus>
                                        @error('dom_etude')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Formulaire entreprise -->
                            <div id="company_form" style="display: none;">
                                <div class="row mb-3">
                                    <label for="poste" class="col-md-4 col-form-label text-md-end">{{ __("Poste") }}</label>
                                    <div class="col-md-6">
                                        <input id="poste" type="text" class="form-control @error('poste') is-invalid @enderror" name="poste" value="{{ old('poste') }}" autocomplete="poste" autofocus>
                                        @error('poste')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="entreprise" class="col-md-4 col-form-label text-md-end">{{ __("Entreprise") }}</label>
                                    <div class="col-md-6">
                                        <select id="entreprise" name="entreprise" class="form-control" onchange="toggleNewCompanyForm()">
                                            <option value="" selected disabled>Sélectionnez une entreprise</option>
                                            @foreach($entreprise as $ent)
                                                <option value="{{ $ent->id }}">{{ $ent->nom }}</option>
                                            @endforeach
                                            <option value="autre">Autre (préciser ci-dessous)</option>
                                        </select>
                                        @error('entreprise')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="nouvelle_entreprise_form" style="display: none;">
                                    <div class="row mb-3">
                                        <label for="nom_ent" class="col-md-4 col-form-label text-md-end">{{ __("Nom de votre entreprise") }}</label>
                                        <div class="col-md-6">
                                            <input id="nom_ent" type="text" class="form-control @error('nom_ent') is-invalid @enderror" name="nom_ent" value="{{ old('nom_ent') }}" autocomplete="nom_ent" autofocus>
                                            @error('nom_ent')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="adresse_ent" class="col-md-4 col-form-label text-md-end">{{ __("Adresse de votre entreprise") }}</label>
                                        <div class="col-md-6">
                                            <input id="adresse_ent" type="text" class="form-control @error('adresse_ent') is-invalid @enderror" name="adresse_ent" value="{{ old('adresse_ent') }}" autocomplete="adresse_ent" autofocus>
                                            @error('adresse_ent')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description_ent" class="col-md-4 col-form-label text-md-end">{{ __("Description de votre entreprise") }}</label>
                                        <div class="col-md-6">
                                            <input id="description_ent" type="text" class="form-control @error('description_ent') is-invalid @enderror" name="description_ent" value="{{ old('description_ent') }}" autocomplete="description_ent" autofocus>
                                            @error('description_ent')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="d-flex flex-row align-items-center justify-content-center w-100">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script pour gérer l'affichage des formulaires en fonction du rôle sélectionné
        function toggleForm() {
            const isStudent = document.getElementById("student").checked;
            document.getElementById("student_form").style.display = isStudent ? "block" : "none";
            document.getElementById("company_form").style.display = isStudent ? "none" : "block";
        }

        // Script pour afficher le formulaire de nouvelle entreprise si "Autre" est sélectionné
        function toggleNewCompanyForm() {
            const entrepriseDropdown = document.getElementById("entreprise");
            const isOtherSelected = entrepriseDropdown.value === "autre";
            document.getElementById("nouvelle_entreprise_form").style.display = isOtherSelected ? "block" : "none";
        }
    </script>
@endsection

