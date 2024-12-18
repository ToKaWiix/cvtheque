{{-- Directive de bldade, spécifiant l'héritage --}}
@extends('cvtheque')

{{-- Directive de blade, spécifiant l'injection du contenu de la section qui suit.
    Le lien est réalisé avec la directive @yield() --}}

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center" colspan="2">
                <a href="{{ route('metiers.create') }}" class="btn btn-primary btn-sm" style="height: 100%;">Créer un métier</a>
            </th>
            <th class="text-center" colspan="3">Actions</th>
        </tr>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Intitulé</th>
            <th class="text-center">Consulter</th>
            <th class="text-center">Modifier</th>
            <th class="text-center">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($metiers as $metier)
        <tr>
            <td class="text-center">{{$metier->id}}</td>
            <td class="text-center">{{$metier->intitule}}</td>
            <td class="text-center">
                <form action="{{ route('metiers.show', $metier->slug) }}" method="GET" style="display:inline;">
                    <button type="submit" class="btn btn-primary me-2">Consulter</button>
                </form>
            </td>
            <td class="text-center">
                <form action="{{route('metiers.edit', $metier->id)}}" method="POST" style="display:inline;">
                    @method('GET')
                    @csrf
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                </form>
            </td>
            <td class="text-center">
                <form action="{{ route('metiers.confirmDelete', $metier->id) }}" method="GET" style="display:inline;">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection