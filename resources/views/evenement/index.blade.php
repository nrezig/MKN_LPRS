<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Evenements</title>
</head>
<body>
<h1>Liste des Evenements</h1>

<div>
    @if(session()->has('confirmation'))
        <div>
            {{session('confirmation')}}
        </div>
    @endif
</div>

<div>
    <a href="{{route('evenement.create')}}">Ajout d'un evenement</a>
</div>

<div>
    <table border="1">
        <tr>

            <th>Nom</th>
            <th>Description</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Duree</th>
            <th>Modifier</th>
            <th>Supprimer</th>


        </tr>
        @foreach($evenement as $evenement)
            <tr>
                <td>{{ $evenement->nom }}</td>
                <td>{{ $evenement->description }}</td>
                <td>{{ $evenement->date }}</td>
                <td>{{$evenement->heure}}</td>
                <td>{{$evenement->duree}}</td>
                <td>
                    <a href ="{{route('evenement.edit',['evenement'=>$evenement])}}">Modifier</a>
                </td>
                <td>
                    <form method="post" action="{{route('evenement.destroy', ['evenement' => $evenement])}}">
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
