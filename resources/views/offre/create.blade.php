<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <select name="type" id="type-select">
            <option value="" disabled selected>Sélectionnez le type d'offre</option>
            @foreach ($types as $type)
                @if ($type->valide)
                    <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                @endif
            @endforeach
            <option value="other">Autre</option>
        </select>
    </div>

    <div id="other-type" style="display: none;">
        <label>Nouveau Type d'offre</label>
        <input type="text" name="new_type" placeholder="Saisissez le nouveau type">
    </div>

    <div>
        <input type="submit" value="Valider">
    </div>
</form>

<script>
    const typeSelect = document.getElementById('type-select');
    const otherType = document.getElementById('other-type');

    typeSelect.addEventListener('change', function () {
        if (typeSelect.value === 'other') {
            otherType.style.display = 'block';
        } else {
            otherType.style.display = 'none';
        }
    });
</script>
</body>
</html>
