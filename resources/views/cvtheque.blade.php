<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>{{$titre ?? ''}}</title>
    <meta name="description" content="{{$description ?? ''}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="bg-light border-end" style="width: 250px;">
                <div class="p-3">
                    <h5 class="mb-3">Menu</h5>
                    <form action="{{ route('professionnels.search') }}" method="GET" class="mb-3">
                        <input type="text" name="query" class="form-control" placeholder="Rechercher un professionnel" minlength="3" required>
                        <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
                    </form>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('competences.index') }}">Compétences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('metiers.index') }}">Métiers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('professionnels.index') }}">Professionnels</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col">
                <h1>Bienvenue sur mon site</h1>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
