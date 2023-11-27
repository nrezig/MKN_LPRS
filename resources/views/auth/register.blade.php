@extends('layouts.app')
@section('content')
    @viteReactRefresh
    @vite(['resources/js/Register.js'])

    <script>

        document.addEventListener("DOMContentLoaded", () => {

            document.getElementById("company").addEventListener("change", () => {
                if (document.getElementById("company").checked) {

                    document.getElementById("company_form").style.display = "block";

                    document.getElementById("student_form").style.display = "none";

                } else {

                    document.getElementById("company_form").style.display = "none";

                    document.getElementById("student_form").style.display = "block";

                }

            })

        });

        document.addEventListener("DOMContentLoaded", () => {

            document.getElementById("student").addEventListener("change", () => {
                if (document.getElementById("student").checked) {

                    document.getElementById("student_form").style.display = "block";

                    document.getElementById("company_form").style.display = "none";

                } else {

                    document.getElementById("student_form").style.display = "none";

                    document.getElementById("company_form").style.display = "block";

                }

            })

        });


        document.addEventListener("DOMContentLoaded", () => {
            const entrepriseDropdown = document.getElementById("entreprise");
            const nouvelleEntrepriseForm = document.getElementById("nouvelle_entreprise_form");
            entrepriseDropdown.addEventListener("change", () => {
                if (entrepriseDropdown.value === "autre") {
                    nouvelleEntrepriseForm.style.display = "block";

                } else {
                    nouvelleEntrepriseForm.style.display = "none";

                }

            });

        });


        document.addEventListener("DOMContentLoaded", () => {
            const entrepriseDropdown = document.getElementById("dom_etude");
            const nouvelleEntrepriseForm = document.getElementById("nouvelle_dom_etude_form");
            entrepriseDropdown.addEventListener("change", () => {
                if (entrepriseDropdown.value === "autre") {
                    nouvelleEntrepriseForm.style.display = "block";

                } else {
                    nouvelleEntrepriseForm.style.display = "none";

                }

            });

        });
    </script>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">

                                <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">

                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                                    @error('nom')

                                    <span class="invalid-feedback" role="alert">

<strong>{{ $message }}</strong>

</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">

                                <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

                                <div class="col-md-6">

                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                                    @error('prenom')

                                    <span class="invalid-feedback" role="alert">

<strong>{{ $message }}</strong>

</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">

                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')

                                    <span class="invalid-feedback" role="alert">

<strong>{{ $message }}</strong>

</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">

                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Passe') }}</label>

                                <div class="col-md-6">

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')

                                    <span class="invalid-feedback" role="alert">

<strong>{{ $message }}</strong>

</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">

                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmation du Mot de Passe') }}</label>

                                <div class="col-md-6">

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>

                            </div>

                            <div class="d-flex flex-row align-items-center justify-content-center w-100">

                                <label> Etudiant : <input class="me-5" name="role" type="radio" id="student" value="Etudiant"> </label>

                                <label> Entreprise : <input name="role" type="radio" id="company" value="Entreprise"> </label>

                            </div>


                            <div id="student_form" style="display: none" class="row mb-3">

                                <br>


                                <div class="row mb-3">
                                    <label for="dom_etude" class="col-md-4 col-form-label text-md-end">{{ __("Domaine d'étude") }}</label>
                                    <div class="col-md-6">
                                        <select id="dom_etude" name="dom_etude" class="form-control">
                                            <option value="" selected disabled>Sélectionnez un domaine d'étude</option>
                                            @foreach(\App\Models\etudiant::all() as $etudiant)
                                                <option value="{{ $etudiant->domaine_etude }}">{{ $etudiant->domaine_etude }}</option>
                                            @endforeach
                                            <option value="autre">▼ Autre ▼</option>
                                        </select>
                                        @error('dom_etude')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="nouvelle_dom_etude_form" style="display: none">

                                <div class="row mb-3">

                                    <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __("Domaine d'étude") }}</label>

                                    <div class="col-md-6">
                                        <input id="dom_etude" type="text" class="form-control @error('dom_etude') is-invalid @enderror" name="dom_etude2" value="{{ old('dom_etude') }}" autocomplete="dom_etude" autofocus>
                                        @error('dom_etude')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                            </div>


                            <div id="company_form" style="display: none" class="row mb-3">

                                <br>

                                <div class="row mb-3">
                                    <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __("Poste") }}</label>
                                    <div class="col-md-6">
                                        <input id="poste" type="text" class="form-control @error('poste') is-invalid @enderror" name="poste" value="{{ old('poste') }}" autocomplete="poste" autofocus>
                                        @error('poste')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="entreprise" class="col-md-4 col-form-label text-md-end">{{ __("Entreprise") }}</label>
                                    <div class="col-md-6">
                                        <select id="entreprise" name="entreprise" class="form-control">
                                            <option value="" selected disabled>Sélectionnez une entreprise</option>
                                            @foreach($entreprise as $entreprise)
                                                <option value="{{ $entreprise->id }}">{{ $entreprise->nom }}</option>
                                            @endforeach
                                            <option value="autre">▼ Autre ▼</option>
                                        </select>
                                        @error('entreprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="nouvelle_entreprise_form" style="display: none">

                                    <div class="row mb-3">
                                        <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __("Nom de votre entreprise") }}</label>
                                        <div class="col-md-6">
                                            <input id="nom_ent" type="text" class="form-control @error('nom_ent') is-invalid @enderror" name="nom_ent" value="{{ old('nom_ent') }}" autocomplete="nom_ent" autofocus>
                                            @error('nom_ent')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __("Adresse de votre entreprise") }}</label>
                                        <div class="col-md-6">
                                            <input id="adresse_ent" type="text" class="form-control @error('adresse_ent') is-invalid @enderror" name="adresse_ent" value="{{ old('adresse_ent') }}" autocomplete="adresse_ent" autofocus>
                                            @error('adresse_ent')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __("Description de votre entreprise") }}</label>
                                        <div class="col-md-6">
                                            <input id="description_ent" type="text" class="form-control @error('description_ent') is-invalid @enderror" name="description_ent" value="{{ old('description_ent') }}" autocomplete="description_ent" autofocus>
                                            @error('description_ent')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br>

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
@endsection
