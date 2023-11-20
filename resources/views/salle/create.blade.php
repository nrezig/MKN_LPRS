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
<h1>Créer une salle</h1>
<form method="post" action="{{route('salle.store')}}">
    @csrf
    @method('post')

    <div>
        <label>Nom de la salle</label>
        <input type="text" name="nom" placeholder="nom">
    </div>

    <div>
        <label>Capacité</label>
        <input type="number" name="capacite" placeholder="capacite">
    </div>

    <div>
        <input type="submit" value="Valider">
    </div>
</form>
</body>
</html>

</body>
</html>