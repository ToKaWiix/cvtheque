<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Metier,
};

use App\Http\Requests\MetierRequest;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metiers = Metier::all();
        /* dd($competences); */
        $data = [
            'titre'=>'Les métiers de la '. config('app.name'), 
            'description'=>'Retourner l\'ensemble des compétences de la '. config('app.name'),
            'metiers'=>$metiers,
        ];

        return view('metiers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetierRequest $metierRequest)
    {
        $metier = new Metier;
        $metier->intitule = $metierRequest->intitule;
        $metier->description = $metierRequest->description;
        $metier->slug = $metierRequest->slug;
        $metier->save();

        $msg = "Enregistrement de métier effectué";
        return redirect()->route('metiers.index')->withInformation($msg);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $metier = Metier::where('slug', $slug)->firstOrFail();
        return view('metiers.show', compact('metier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metier $metier)
    {
        $data = [
            'titre' => 'Détails de la compétence',
            'description' => 'Informations sur la compétence sélectionnée',
            'slug' => 'Slug',
            'metier' => $metier,
        ];

        return view('metiers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetierRequest $metierRequest, Metier $metier)
    {
        $valideData = $metierRequest->all();
        $metier->update($valideData);

        $msg = "Enregistrement de la modification effectuée";
        return redirect()->route('metiers.index')->withInformation($msg);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metier $metier)
    {
        $metier->delete();

        return back()->withInformation('Le metier est supprimée');
    }



    public function confirmDelete(Metier $metier)
{
    $data = [
        'titre' => 'Confirmer la suppression',
        'description' => 'Êtes-vous sûr de vouloir supprimer ce métier ?',
        'metier' => $metier,
    ];

    return view('metiers.confirmDelete', $data);
}
}
