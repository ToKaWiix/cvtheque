@extends('cvtheque')

@section('content')

<a href="{{ route('competences.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <h1>Confirmer la suppression</h1>
    <p>ID: {{ $competence->id }}</p>
    <p>Intitulé: {{ $competence->intitule }}</p>
    <p>Description: {{ $competence->description }}</p>

    <form method="POST" action="{{ route('competences.destroy', $competence->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
    </form>
</div>

@endsection 