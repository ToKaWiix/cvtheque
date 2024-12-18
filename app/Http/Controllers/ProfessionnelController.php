<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Competence,
    Professionnel,
    Metier
};
use App\Http\Requests\MetierRequest;
use App\Http\Requests\ProfessionnelRequest;

class ProfessionnelController extends Controller
{
    public function index(Request $request)
    {
        $query = Professionnel::query();

        if ($request->filled('metier')) {
            $query->where('metier_id', $request->metier);
        }

        $professionnels = $query->paginate(10);
        $metiers = Metier::all();

        return view('professionnels.index', compact('professionnels', 'metiers'));
    }

    public function create()
    {
        $metiers = Metier::all();
        $competences = Competence::orderBy('intitule')->get();
        return view('professionnels.create', compact('metiers', 'competences'));
    }

    public function store(ProfessionnelRequest $request)
    {
        $data = $request->validated();
        $professionnel = Professionnel::create($data);
        
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->storeAs('cvs', $request->file('cv')->getClientOriginalName());
            $professionnel->cv = $cvPath;
        }
        
        return redirect()->route('professionnels.index')->with('success', 'Professionnel créé avec succès.');
    }

    public function edit($id)
    {
        $professionnel = Professionnel::findOrFail($id);
        $metiers = Metier::all();
        $competences = Competence::orderBy('intitule')->get();
        return view('professionnels.edit', compact('professionnel', 'metiers', 'competences'));
    }

    public function update(ProfessionnelRequest $request, $id)
    {
        $professionnel = Professionnel::findOrFail($id);

        // Récupérer les données validées
        $data = $request->validated();

        // Mettre à jour le professionnel avec les données validées
        $professionnel->update($data);

        // Synchroniser les compétences si elles sont présentes
        if ($request->has('competences')) {
            $competences = $request->competences; // Récupérer les compétences
            $professionnel->competences()->sync($competences); // Synchroniser
        } else {
            // Si aucune compétence n'est sélectionnée, on peut choisir de ne rien faire ou de retirer toutes les compétences
            // $professionnel->competences()->detach(); // Décommenter si vous souhaitez retirer toutes les compétences
        }

        return redirect()->route('professionnels.index')->with('success', 'Professionnel mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $professionnel = Professionnel::findOrFail($id);
        $professionnel->delete();

        return redirect()->route('professionnels.index')->with('success', 'Professionnel supprimé avec succès.');
    }

    public function show(Professionnel $professionnel)
    {
        return view('professionnels.show', compact('professionnel'));
    }

    public function confirmDelete($id)
    {
        $professionnel = Professionnel::findOrFail($id);
        dd($professionnel);
        return view('professionnels.confirmDelete', compact('professionnel'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        dd($query);

        $professionnels = Professionnel::where('prenom', 'LIKE', "%{$query}%")
            ->orWhere('nom', 'LIKE', "%{$query}%")
            ->paginate(10);

        $metiers = Metier::all();

        return view('professionnels.index', compact('professionnels', 'metiers'));
    }
}
