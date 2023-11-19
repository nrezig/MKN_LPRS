@extends("layouts.template")
@section("content")

    <div>
        @if(session()->has('confirmation'))
            <div>
                {{ session('confirmation') }}
            </div>
        @endif
    </div>

    <br>
    <h4> Validation des Utilisateurs </h4>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg container mx-auto mt-8" >
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"  >
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prénom
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Valide
                </th>
                <th scope="col" class="px-6 py-3">
                    Valider
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $users)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $users->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $users->nom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $users->prenom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $users->email }}
                    </td>
                    <td class="px-6 py-4" align="center">
                        {{ $users->valide }}
                    </td>

                    <td class="px-6 py-4">
                        <form action="{{ route('admin.valider_user')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$users->id}}">
                            <input type="hidden" name="_method" value="POST">
                            <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" value="Valider" />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

