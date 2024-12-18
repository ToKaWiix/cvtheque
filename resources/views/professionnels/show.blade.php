@extends('cvtheque')

@section('content')
<a href="{{ route('professionnels.index') }}" class="btn btn-primary">Retour</a>
<h1>{{ $professionnel->nom }}</h1>
<p>ID: {{ $professionnel->id }}</p>
<p>Prénom: {{ $professionnel->prenom }}</p>
<p>Code Postal: {{ $professionnel->cp }}</p>
<p>Ville: {{ $professionnel->ville }}</p>
<p>Téléphone: {{ $professionnel->telephone }}</p>
<p>Email: {{ $professionnel->email }}</p>
<p>Date de Naissance: {{ $professionnel->naissance }}</p>
<p>Formation: {{ $professionnel->formation }}</p>
<p>Domaine: {{ $professionnel->domaine }}</p>
<p>Source: {{ $professionnel->source }}</p>
<p>Observation: {{ $professionnel->observation }}</p>
<p>Métier: {{ $professionnel->metier->name ?? 'N/A' }}</p>
@if($professionnel->cv)
<div class="form-group row">
    <div class="col-md-8 col-form-label">
        <a href="{{ asset('storage' . $professionnel->cv) }}" target="_blank">Voir le CV</a>
    </div>
@else
    <div class="col-md-8 col-form-label">
        Il n'y a aucun CV d'associé à ce profil.
    </div>
@endif
@endsection