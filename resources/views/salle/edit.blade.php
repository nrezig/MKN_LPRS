<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Modifiez une salle</h1>
<form method="post" action="{{route('salle.update', ['salle'=>$salle])}}">
    @csrf
    @method('put')

    <div>
        <label>Nom de la salle</label>
        <label>
            <input type="text" name="nom" placeholder="nom" value="{{$salle->nom}}">
        </label>
    </div>

    <div>
        <label>Capacité</label>
        <input type="number" name="capacité" placeholder="capacite" value="{{$salle->capacite}}">
    </div>

    <div>
        <input type="submit" value="Modifier">
    </div>
</form>
</body>
</html>
