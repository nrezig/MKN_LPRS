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
<h1>Modifiez un evenement</h1>
<form method="post" action="{{route('evenement.update', ['evenement'=>$evenement])}}">
    @csrf
    @method('put')

    <div>
        <label>Nom de l'evenement</label>
        <label>
            <input type="text" name="nom" placeholder="nom" value="{{$evenement->nom}}">
        </label>
    </div>

    <div>
        <label>Description</label>
        <label>
            <input type="text" name="description" placeholder="description" value="{{$evenement->description}}"/>
        </label>
    </div>

    <div>
        <label>Date</label>
        <label>
            <input type="date" name="date" placeholder="date" value="{{$evenement->date}}"/>
        </label>
    </div>

    <div>
        <label>Heure</label>
        <input type="time" name="heure" placeholder="heure" value="{{$evenement->heure}}">
    </div>

    <div>
        <label>Duree</label>
        <input type="text" name="duree" placeholder="duree" value="{{$evenement->duree}}" pattern="[0-23]{2}:[0-60]{2}:[0-60]{2}">
    </div>

    <div>
        <input type="submit" value="Modifier">
    </div>
</form>
</body>
</html>
