@extends('cvtheque')

@section('content')

<a href="{{ route('competences.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <h1>{{ $competence->intitule }}</h1>
    <p>ID: {{$competence->id}}</p>
    <p>Description: {{$competence->description}}</p>
</div>

@endsection
