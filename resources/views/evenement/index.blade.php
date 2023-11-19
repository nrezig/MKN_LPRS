@extends("layouts.template")
@section("content")
<div>
    @if(session()->has('confirmation'))
        <div>
            {{session('confirmation')}}
        </div>
    @endif
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg container mx-auto mt-8" >
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"  >
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Nom
            </th>
            <th scope="col" class="px-6 py-3">
                Description
            </th>
            <th scope="col" class="px-6 py-3">
                Date
            </th>
            <th scope="col" class="px-6 py-3">
                Heure
            </th>
            <th scope="col" class="px-6 py-3">
                Duree
            </th>
            <th scope="col" class="px-6 py-3">
                Ajouter
            </th>
            <th scope="col" class="px-6 py-3">
                Modifier
            </th>
            <th scope="col" class="px-6 py-3">
                Supprimer
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($evenement as $evenement)
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $evenement->nom }}
                </th>
                <td class="px-6 py-4">
                    {{ $evenement->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $evenement->date }}
                </td>
                <td class="px-6 py-4">
                    {{$evenement->heure}}
                </td>
                <td class="px-6 py-4">
                    {{$evenement->duree}}
                </td>
                <td class="px-6 py-4 ">
                    <a href="{{route('evenement.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ajouter</a>
                </td>
                <td class="px-6 py-4 ">
                    <a href="{{route('evenement.edit',['evenement'=>$evenement])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                </td>
                <td class="px-6 py-4 ">
                    <form method="post" action="{{route('evenement.destroy', ['evenement' => $evenement])}}">
                        @csrf
                        @method('delete')
                        <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" value="Supprimer" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
