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
                'name' => 'required',
                'contenu_seance_par_jour' => 'required',
                'image' => 'required',
            ]
        )->validate();

        //Récupération d'un circuit dans la base de donnée en fonction de l'id entrée dans l'url
        $dataSeance = SeanceModel::find(1)
            ->where('id', '=', $id)
            ->first();

        //Mise en relation des inputs et des colonnes pour la modification
        $dataSeance->name = $dataUpdate['name'];
        $dataSeance->contenu_seance_par_jour = $dataUpdate['contenu_seance_par_jour'];
        $dataSeance->image = $dataUpdate['image'];
        //Sauvegarde des données entrées en base de donnée
        $dataSeance->save();
        return new SeancesRessource($dataSeance);
    }
}
