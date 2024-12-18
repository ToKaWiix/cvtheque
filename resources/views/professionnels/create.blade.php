@extends('cvtheque')

@section('content')
<a href="{{ route('professionnels.index') }}" class="btn btn-primary" style="height: 100%;">Retour</a>
<div>
    <form method="POST" action="{{ route('professionnels.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" maxlength="25" required>
            @error('prenom')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" maxlength="40" required>
            @error('nom')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Adresse E-mail :</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" maxlength="255" required>
            @error('email')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="cp">Code Postal :</label>
            <input type="text" class="form-control @error('cp') is-invalid @enderror" id="cp" name="cp" value="{{ old('cp') }}" maxlength="5" required>
            @error('cp')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="ville">Ville :</label>
            <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville') }}" maxlength="40" required>
            @error('ville')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" maxlength="14" required>
            @error('telephone')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="naissance">Date de Naissance :</label>
            <input type="date" class="form-control @error('naissance') is-invalid @enderror" id="naissance" name="naissance" value="{{ old('naissance') }}" required>
            @error('naissance')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Formation :</label>
            <div>
                <input type="radio" id="formation_oui" name="formation" value="1" {{ old('formation') == '1' ? 'checked' : '' }} required>
                <label for="formation_oui">Oui</label>
            </div>
            <div>
                <input type="radio" id="formation_non" name="formation" value="0" {{ old('formation') == '0' ? 'checked' : '' }}>
                <label for="formation_non">Non</label>
            </div>
            @error('formation')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="domaine">Domaine :</label>
            <select name="domaine" id="domaine" class="form-select @error('domaine') is-invalid @enderror" required>
                <option value="">Sélectionnez un domaine</option>
                <option value="S" {{ old('domaine') == 'S' ? 'selected' : '' }}>S</option>
                <option value="R" {{ old('domaine') == 'R' ? 'selected' : '' }}>R</option>
                <option value="D" {{ old('domaine') == 'D' ? 'selected' : '' }}>D</option>
            </select>
            @error('domaine')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="metier_id">Métier :</label>
            <select name="metier_id" id="metier_id" class="form-select @error('metier_id') is-invalid @enderror" required>
                <option value="">Sélectionnez un métier</option>
                @foreach($metiers as $metier)
                    <option value="{{ $metier->id }}" {{ old('metier_id') == $metier->id ? 'selected' : '' }}>{{ $metier->intitule }}</option>
                @endforeach
            </select>
            @error('metier_id')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="source">Source :</label>
            <input type="text" class="form-control @error('source') is-invalid @enderror" id="source" name="source" value="{{ old('source') }}">
            @error('source')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="observation">Observation :</label>
            <textarea class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation">{{ old('observation') }}</textarea>
            @error('observation')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="competences">Compétences :</label>
            <select class="form-control @error('competences') is-invalid @enderror" id="competences" name="competences[]" multiple>
                @foreach($competences as $competence)
                    <option value="{{ $competence->id }}">{{ $competence->intitule }}</option>
                @endforeach
            </select>
            @error('competences')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="cv">CV :</label>
            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" required>
            @error('cv')
            <p class="text-danger" role="alert">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary float-end">Créer</button>
    </form>
</div>
@endsection 