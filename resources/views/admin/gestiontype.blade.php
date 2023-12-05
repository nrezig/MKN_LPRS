@extends('layouts.app')

@php
    $types = \App\Models\Type::all();
@endphp

@section('content')
    <h2>Liste des Types</h2>


    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('types.create') }}" class="btn btn-primary">Ajouter un type</a>


    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table border="1">
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Valide</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($types as $type)
            <tr>
                <td>{{ $type->libelle }}</td>
                <td>{{ $type->valide }}</td>
                <td>
                    @if ($type->valide == 0)
                        <form action="{{ route('types.valider', $type->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">Valider</button>
                        </form>
                    @else
                        <span>Validé</span>
                    @endif

                    <!-- Bouton Supprimer avec confirmation -->
                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display: inline;" onsubmit="return handleDelete(event, {{ $type->id }});">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
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
