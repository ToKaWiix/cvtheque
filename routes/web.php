<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CvthequController,
    CompetenceController,
    MetierController,
    ProfessionnelController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*http://localhost:8888/TEST-thierry/cvtheque-cda/public/professionnels

/* Route::get('/', function () {
    return view('welcome');
}); */
/* Route::get('/', function () {
    return view('cvtheque');
}); */
 Route::get('/', [CvthequController::class, 'index']) -> name('Accueil');

 Route::resource('competences', CompetenceController::class);
 Route::resource('metiers', MetierController::class);
 Route::resource('professionnels', ProfessionnelController::class);
 Route::get('competences/{competence}/confirm-delete', [CompetenceController::class, 'confirmDelete'])->name('competences.confirmDelete');
 Route::get('metiers/{metier}/confirm-delete', [MetierController::class, 'confirmDelete'])->name('metiers.confirmDelete');
 Route::get('/metiers/{slug}', [MetierController::class, 'show'])->name('metiers.show');
 Route::delete('/professionnels/{id}', [ProfessionnelController::class, 'destroy'])->name('professionnels.destroy');
 Route::get('/professionnels/{id}/confirm-delete', [ProfessionnelController::class, 'confirmDelete'])->name('professionnels.confirmDelete');
 Route::get('professionnels/search', [ProfessionnelController::class, 'search'])->name('professionnels.search');

