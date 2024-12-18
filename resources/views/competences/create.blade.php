@extends('cvtheque')

@section('content')

<a href="{{ route('competences.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <form method="POST" action="{{route('competences.store')}}">
        @method('POST')
        @csrf
        <div>
            <label for="intitule">Intitulé :</label>
            <textarea class="form-control @error('intitule') is-invalid @enderror" id="intitule" name="intitule">
                {{ old('intitule') }}
            </textarea>
            @error('intitule')
            <p class="text-danger" role="alert">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                {{ old('description') }}
            </textarea>
            @error('description')
            <p class="text-danger" role="alert">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary float-end">Créer</button>
    </form>
</div>

@endsection