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

            <div class="container">
                <br>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __("Modifier une offre") }}</div>
                            <form method="post" action="{{ route('admin.offre.update', ['offre' => $offre]) }}">
                            @csrf
                                @method('put')
                                <br>
                                <div class="row mb-3">
                                    <label for="titre_offre" class="col-md-4 col-form-label text-md-end">Titre de l'offre</label>
                                    <div class="col-md-6">
                                        <input id="titre_offre" type="text" class="form-control" name="titre" placeholder="titre" value="{{$offre->titre}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description_offre" class="col-md-4 col-form-label text-md-end">Description</label>
                                    <div class="col-md-6">
                                        <input id="description_offre" type="text" class="form-control" name="description" placeholder="description" value="{{$offre->description}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="etat" class="col-md-4 col-form-label text-md-end">État</label>
                                    <div class="col-md-6">
                                        <input id="etat" type="text" class="form-control" name="etat" placeholder="état" value="{{$offre->etat}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="type-select" class="col-md-4 col-form-label text-md-end">{{ __("Type d'offre") }}</label>
                                    <div class="col-md-6">
                                        <select id="type-select" name="type" class="form-control" onchange="toggleNewCompanyForm()">
                                            <option value="" selected disabled>Sélectionnez le type d'offree</option>
                                            @foreach ($types as $type)
                                                @if ($type->valide)
                                                    <option value="{{ $type->id }}" {{ $type->id == $offre->type->id ? 'selected' : '' }}>
                                                        {{ $type->libelle }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <option value="other" {{ $offre->type->libelle == 'Other' ? 'selected' : '' }}>Autre (préciser ci-dessous)</option>
                                        </select>
                                        @error('type_offre')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="other-type" style="display: none;">
                                    <div class="row mb-3">
                                        <label for="other-type" class="col-md-4 col-form-label text-md-end">{{ __("Nouveau Type d'offre") }}</label>
                                        <div class="col-md-6">
                                            <input id="other-type" type="text" class="form-control @error('new_type') is-invalid @enderror" name="new_type" value="{{ old('new_type') }}" autocomplete="new_type" placeholder="Saisissez le nouveau type" autofocus>
                                            @error('new_type')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="d-flex flex-row align-items-center justify-content-center w-100">
                                            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
    const typeSelect = document.getElementById('type-select');
    const otherType = document.getElementById('other-type');

    typeSelect.addEventListener('change', function () {
        if (typeSelect.value === 'other') {
            otherType.style.display = 'block';
        } else {
            otherType.style.display = 'none';
        }
    });
</script>

@endsection


