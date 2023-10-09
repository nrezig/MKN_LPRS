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
<h1>Créer un evenment</h1>
<form method="post" action="{{route('evenement.store')}}">
    @csrf
    @method('post')

    <div>
        <label>Nom de l'evenement</label>
        <input type="text" name="nom" placeholder="nom">
    </div>

    <div>
        <label>Description</label>
        <input type="text" name="description" placeholder="description">
    </div>

    <div>
        <label>Date</label>
        <input type="date" name="date" placeholder="date">
    </div>

    <div>
        <label>Heure</label>
        <input type="time" name="heure" placeholder="heure">
    </div>

    <div>
        <label>Duree</label>
        <input type="text" name="duree" placeholder="duree" pattern="[0-23]{2}:[0-60]{2}:[0-60]{2}">
    </div>

    <div>
        <input type="submit" value="Valider">
    </div>
</form>
</body>
</html>

</body>
</html>




