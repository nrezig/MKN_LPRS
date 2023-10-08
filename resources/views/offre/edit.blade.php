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
<h1>Modifiez une offre</h1>
<form method="post" action="{{route('offre.update', ['offre'=>$offre])}}">
    @csrf
    @method('put')

    <div>
        <label>Titre de l'offre</label>
        <label>
            <input type="text" name="titre" placeholder="titre" value="{{$offre->titre}}">
        </label>
    </div>

    <div>
        <label>Description</label>
        <label>
            <input type="text" name="description" placeholder="description" value="{{$offre->description}}"/>
        </label>
    </div>

    <div>
        <label>Type d'offre</label>
        <label for="type"></label><select name="type" id="type">
            <option value="CDI">CDI</option>
            <option value="CDD">CDD</option>
            <option value="apprentissage">Apprentissage</option>
            <option value="stage">Stage</option>
        </select>
    </div>

    <div>
        <label>Etat</label>
        <label>
            <input type="text" name="etat" placeholder="etat" value="{{$offre->etat}}"/>
        </label>
    </div>


    <div>
        <input type="submit" value="Modifier">
    </div>
</form>
</body>
</html>
