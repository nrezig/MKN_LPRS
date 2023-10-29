<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une offre</title>
</head>
<body>
<h1>Modifier une offre</h1>
<form method="post" action="{{route('offre.update', ['offre' => $offre])}}">
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
        <label>État</label>
        <label>
            <input type="text" name="etat" placeholder="état" value="{{$offre->etat}}"/>
        </label>
    </div>

    <div>
        <label>Type d'offre</label>
        <select name="type" id="type-select">
            <option value="" disabled selected>Sélectionnez le type d'offre</option>
            @foreach ($types as $type)
                @if ($type->valide)
                    <option value="{{ $type->id }}" {{ $type->id == $offre->type->id ? 'selected' : '' }}>
                        {{ $type->libelle }}
                    </option>
                @endif
            @endforeach
            <option value="other" {{ $offre->type->libelle == 'Other' ? 'selected' : '' }}>Autre</option>
        </select>
    </div>

    <div id="other-type" style="display: none;">
        <label>Nouveau Type d'offre</label>
        <input type="text" name="new_type" placeholder="Saisissez le nouveau type">
    </div>

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




    <div>
        <input type="submit" value="Modifier">
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
