<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeancesRessource;
use App\SeanceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeancesController extends Controller
{
    public function update(Request $request, $id)
    {
        //Validation des données entrantes
        $dataUpdate = Validator::make(
            $request->all(),
            [
                'exercice' => 'required',
                'quantite_serie' => 'required',
                'temps_recuperation' => 'required',
                'nombre_jours' => 'required'
            ]
        )->validate();

        //Récupération d'un circuit dans la base de donnée en fonction de l'id entrée dans l'url
        $dataSeance = SeanceModel::find(1)
            ->where('id', '=', $id)
            ->first();

        //Mise en relation des inputs et des colonnes pour la modification
        $dataSeance->exercice = $dataUpdate['exercice'];
        $dataSeance->quantite_serie = $dataUpdate['quantite_serie'];
        $dataSeance->temps_recuperation = $dataUpdate['temps_recuperation'];
        $dataSeance->nombre_jours = $dataUpdate['nombre_jours'];
        //Sauvegarde des données entrées en base de donnée
        $dataSeance->save();
        return new SeancesRessource($dataSeance);
    }
}
