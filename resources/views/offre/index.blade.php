<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Offres d'Emploi</title>
</head>
<body>
<h1>Liste des Offres d'Emploi</h1>

<div>
    @if(session()->has('confirmation'))
        <div>
            {{session('confirmation')}}
        </div>
    @endif
</div>

<div>
    <a href="{{route('offre.create')}}">Ajout d'offre</a>
</div>

<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Type</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Modifier</th>
            <th>Supprimer</th>


        </tr>
        @foreach($offre as $offre)
            <tr>
                <td>{{ $offre->id }}</td>
                <td>{{ $offre->titre }}</td>
                <td>
                    @if ($offre->ref_type === 1)
                        CDI
                    @elseif ($offre->ref_type === 2)
                        CDD
                    @elseif ($offre->ref_type === 3)
                        Apprentissage
                    @elseif ($offre->ref_type === 4)
                        Stage
                    @endif
                </td>
                <td>{{ $offre->description }}</td>
                <td>{{ $offre->etat }}</td>
               <td>
                   <a href ="{{route('offre.edit',['offre'=>$offre])}}">Modifier</a>
               </td>
                <td>
                    <form method="post" action="{{route('offre.destroy', ['offre' => $offre])}}">
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
