@extends('cvtheque')

@section('content')

<a href="{{ route('metiers.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <h1>Confirmer la suppression</h1>
    <p>ID: {{ $metier->id }}</p>
    <p>Intitulé: {{ $metier->intitule }}</p>
    <p>Description: {{ $metier->description }}</p>
    <p>Slug: {{ $metier->slug }}</p>

    <form method="POST" action="{{ route('metiers.destroy', $metier->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
    </form>
</div>

@endsection 