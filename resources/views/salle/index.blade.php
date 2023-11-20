<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des salles</title>
</head>
<body>
<h1>Liste des salles</h1>

<div>
    @if(session()->has('confirmation'))
        <div>
            {{session('confirmation')}}
        </div>
    @endif
</div>

<div>
    <a href="{{route('salle.create')}}">Ajout d'une salle</a>
</div>

<div>
    <table border="1">
        <tr>

            <th>Nom</th>
            <th>Capacité</th>
            <th>Modifier</th>
            <th>Supprimer</th>


        </tr>
        @foreach($salle as $salle)
            <tr>
                <td>{{ $salle->nom }}</td>
                <td>{{ $salle->capacite }}</td>
                <td>
                    <a href ="{{route('salle.edit',['salle'=>$salle])}}">Modifier</a>
                </td>
                <td>
                    <form method="post" action="{{route('salle.destroy', ['salle' => $salle])}}">
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
