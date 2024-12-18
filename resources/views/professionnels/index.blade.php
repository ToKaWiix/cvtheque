@extends('cvtheque')

@section('content')
<form method="GET" action="{{ route('professionnels.index') }}">
     <div>
         <label for="metier">Filtrer par métier :</label>
         <select name="metier" id="metier" class="form-select">
             <option value="">Tous les métiers</option>
            @foreach($metiers as $metier)
                <option value="{{ $metier->id }}">{{ $metier->intitule }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Filtrer</button>
</form>
<a href="{{ route('professionnels.create') }}" class="btn btn-primary">Créer un professionnel</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom et Prénom</th>
            <th>Métier</th>
            <th>Domiciliation</th>
            <th>Formation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professionnels as $professionnel)
        <tr>
            <td>{{ $professionnel->id }}</td>
            <td>{{ $professionnel->prenom }} {{ $professionnel->nom }}</td>
            <td>{{ $professionnel->metier->intitule ?? 'N/A' }}</td>
            <td>{{ $professionnel->cp }} {{ $professionnel->ville }}</td>
            <td>{{ $professionnel->formation ? 'OUI' : 'NON' }}</td>
            <td>
                <a href="{{ route('professionnels.show', $professionnel->id) }}" class="btn btn-info">Consulter</a>
                <a href="{{ route('professionnels.edit', $professionnel->id) }}" class="btn btn-warning">Modifier</a>
                <a href="{{ route('professionnels.confirmDelete', $professionnel->id) }}" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<footer>
    {{ $professionnels->links('pagination::bootstrap-4') }}
</footer>
@endsection