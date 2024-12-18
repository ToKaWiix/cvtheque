@extends('cvtheque')

@section('content')

<a href="{{ route('metiers.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <h1>{{ $metier->intitule }}</h1>
    <p>ID: {{$metier->id}}</p>
    <p>Description: {{$metier->description}}</p>
    <p>Slug: {{$metier->slug}}</p>
</div>

@endsection