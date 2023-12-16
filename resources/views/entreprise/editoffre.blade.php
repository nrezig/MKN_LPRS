@extends('layouts.template')
@section('content')

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="sidebar bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="{{ route('entreprise.dashboard') }}" class="text-gray-700 flex items-center space-x-2 px-4">
                <span class="text-2xl font-bold">Menu Entreprise</span>
            </a>
            <nav>
                <a href="{{ route('entreprise.gestionoffre') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">Gérer les Offres</a>
                <!-- Remplacez 'x' par les noms réels de vos routes -->
            </nav>
        </div>

        <div class="container">
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Modifier une offre</div>
                        <div class="card-body">
                        <form method="post" action="{{ route('entreprise.offre.update', ['offre' => $offre]) }}">

    @csrf
    @method('put')


                            <div class="row mb-3">
                                <label for="titre_offre" class="col-md-4 col-form-label text-md-end">Titre de l'offre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Titre" id="titre_offre" name="titre" value="{{$offre->titre}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="desc" class="col-md-4 col-form-label text-md-end">Description</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Titre" id="desc" name="description" value="{{$offre->description}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="etat" class="col-md-4 col-form-label text-md-end">État</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="État" id="etat" name="etat" value="{{$offre->etat}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type-select" class="col-md-4 col-form-label text-md-end">{{ __("Type d'offre") }}</label>
                                <div class="col-md-6">
                                    <select id="type-select" name="type" class="form-control" onchange="toggleNewCompanyForm()">
                                        <option value="" selected disabled>Sélectionnez le type d'offre</option>
                                        @foreach ($types as $type)
                                            @if ($type->valide)
                                                <option value="{{ $type->id }}" {{ $type->id == $offre->type->id ? 'selected' : '' }}>
                                                    {{ $type->libelle }}
                                                </option>
                                            @endif
                                        @endforeach
                                        <option value="other" {{ $offre->type->libelle == 'Other' ? 'selected' : '' }}>Autre (préciser ci-dessous)</option>
                                    </select>
                                    @error('type-select')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div id="other-type" style="display: none;">
                                <div class="row mb-3">
                                    <label for="new_type" class="col-md-4 col-form-label text-md-end">{{ __("Saisissez le nouveau type") }}</label>
                                    <div class="col-md-6">
                                        <input id="new_type" type="text" class="form-control @error('new_type') is-invalid @enderror" name="new_type" value="{{ old('new_type') }}" autocomplete="new_type" autofocus placeholder="Saisissez le nouveau type">
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
</form>

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
