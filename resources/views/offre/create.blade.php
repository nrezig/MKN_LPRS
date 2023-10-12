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
<h1>Ajoutez une offre</h1>
<form method="post" action="{{ route('offre.store') }}">

    @csrf
    @method('post')

    <div>
        <label>Titre de l'offre</label>
        <input type="text" name="titre" placeholder="titre">
    </div>

    <div>
        <label>Description</label>
        <input type="text" name="description" placeholder="description">
    </div>

    <div>
        <label>Type d'offre</label>
        <input type ="text" name="type" placeholder="type d'offre">
    </div>


    <div>
        <input type="submit" value="Valider">
    </div>
</form>
</body>
</html>
