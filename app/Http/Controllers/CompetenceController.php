<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Competence,
};

use App\Http\Requests\CompetenceRequest;


class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = Competence::all();
        /* dd($competences); */
        $data = [
            'titre'=>'Les compétences de la '. config('app.name'), 
            'description'=>'Retourner l\'ensemble des compétences de la '. config('app.name'),
            'competences'=>$competences,
        ];

        return view('competences.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('competences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $competenceRequest)
    {
/*         $valideData = $competenceRequest->all();
       // dd($valideData);

        Competence::create($valideData);

        $msg = "Enregistrement effectué";
        return redirect()->route('competences.index')->withInformation($msg); */

        // instancier run objet compétence
        $competence = new Competence;
        $competence->intitule = $competenceRequest->intitule;
        $competence->description = $competenceRequest->description;
        $competence->save();

        $msg = "Enregistrement effectué";
        return redirect()->route('competences.index')->withInformation($msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        $data = [
            'titre' => 'Détails de la compétence',
            'description' => 'Informations sur la compétence sélectionnée',
            'competence' => $competence,
        ];
        
        return view('competences.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        $data = [
            'titre' => 'Détails de la compétence',
            'description' => 'Informations sur la compétence sélectionnée',
            'competence' => $competence,
        ];

        return view('competences.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenceRequest $competenceRequest, Competence $competence)
    {
        $valideData = $competenceRequest->all();
        $competence->update($valideData);

        $msg = "Enregistrement de la modification effectuée";
        return redirect()->route('competences.index')->withInformation($msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();

        return redirect()->route('competences.index')->withInformation('La compétence a été supprimée avec succès.');
    }

    public function confirmDelete(Competence $competence)
    {
        $data = [
            'titre' => 'Confirmer la suppression',
            'description' => 'Êtes-vous sûr de vouloir supprimer cette compétence ?',
            'competence' => $competence,
        ];

        return view('competences.confirmDelete', $data);
    }
}
