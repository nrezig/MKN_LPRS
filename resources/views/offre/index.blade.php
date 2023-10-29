<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Offres d'Emploi</title>
</head>
<body>
<h1>Liste des Offres d'Emploi</h1>

<div>
    @if(session()->has('confirmation'))
        <div>
            {{ session('confirmation') }}
        </div>
    @endif
</div>

<div>
    <a href="{{ route('offre.create') }}">Ajout d'offre</a>
</div>

<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Type</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Valide</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        @foreach($offre as $offre)
            <tr>
                <td>{{ $offre->id }}</td>
                <td>{{ $offre->titre }}</td>
                <td>{{ $offre->type->libelle }}</td>
                <td>{{ $offre->description }}</td>
                <td>{{ $offre->etat }}</td>
                <td>
                    @if ($offre->type->valide == 1)
                        Valide
                    @else
                        Non
                    @endif
                </td>
                <td>
                    <a href="{{ route('offre.edit', ['offre' => $offre]) }}">Modifier</a>
                </td>
                <td>
                    <form method="post" action="{{ route('offre.destroy', ['offre' => $offre]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Supprimer" />
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
