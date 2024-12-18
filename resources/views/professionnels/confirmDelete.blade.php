@extends('cvtheque')

@section('content')

<a href="{{ route('professionnels.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <h1>Confirmer la suppression</h1>
    <p>ID: {{ $professionnel->id }}</p>
    <p>Nom: {{ $professionnel->nom }}</p>
    <p>Prénom: {{ $professionnel->prenom }}</p>
    <p>Êtes-vous sûr de vouloir supprimer ce professionnel ?</p>

    <form method="POST" action="{{ route('professionnels.destroy', $professionnel->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
    </form>
</div>



@endsection 