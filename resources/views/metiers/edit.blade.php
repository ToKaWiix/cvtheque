@extends('cvtheque')

@section('content')

<a href="{{ route('metiers.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <form method="POST" action="{{route('metiers.update', ['metier'=>$metier->id])}}">
        @method('PUT')
        @csrf
        <div>
            <label for="intitule">Intitulé :</label>
            <textarea class="form-control @error('intitule') is-invalid @enderror" id="intitule" name="intitule">
                {{ old('intitule', $metier->intitule) }}
            </textarea>
            @error('intitule')
            <p class="text-danger" role="alert">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                {{ old('description', $metier->description) }}
            </textarea>
            @error('description')
            <p class="text-danger" role="alert">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="slug">Slug :</label>
            <textarea class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
                {{ old('slug', $metier->slug) }}
            </textarea>
            @error('slug')
            <p class="text-danger" role="alert">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary float-end">Modifier</button>
    </form>
</div>

@endsection