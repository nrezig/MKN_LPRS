@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $evenement->nom }}</h3>
                <p class="card-text">{{ $evenement->description }}</p>

                <form method="POST" action="{{ route('etudiant.inscrireEvenement', ['evenement' => $evenement->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
@endsection
