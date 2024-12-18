{{-- Directive de bldade, spécifiant l'héritage --}}
@extends('cvtheque')

{{-- Directive de blade, spécifiant l'injection du contenu de la section qui suit.
    Le lien est réalisé avec la directive @yield() --}}

    @section('content')
<!-- Formulaire de recherche -->
<form method="GET" action="{{ route('competences.index') }}" class="mb-3">
    <input type="text" name="search" placeholder="Rechercher une compétence" class="form-control" />
    <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center" colspan="2">
                <a href="{{ route('competences.create') }}" class="btn btn-primary btn-sm" style="height: 100%;">Créer une compétence</a>
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
        @foreach($competences as $competence)
        <tr>
            <td class="text-center">{{$competence->id}}</td>
            <td class="text-center">{{$competence->intitule}}</td>
            <td class="text-center">
                <form action="{{route('competences.show', $competence->id)}}" method="POST" style="display:inline;">
                    @method('GET')
                    @csrf
                    <button type="submit" class="btn btn-primary me-2">Consulter</button>
                </form>
            </td>
            <td class="text-center">
                <form action="{{route('competences.edit', $competence->id)}}" method="POST" style="display:inline;">
                    @method('GET')
                    @csrf
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                </form>
            </td>
            <td class="text-center">
                <form action="{{ route('competences.confirmDelete', $competence->id) }}" method="GET" style="display:inline;">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection