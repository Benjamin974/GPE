<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProgrammesRessource;
use App\ProgrammeModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgrammesController extends Controller
{
    public function index()
    {
        $programmes = ProgrammeModel::all();
        return ProgrammesRessource::collection($programmes);
    }

    public function addProgrammesProducteur(Request $request, $id)
    {
        $dataPro = ProgrammeModel::where('id_user', '=', $id)->get();
        return ProgrammesRessource::collection($dataPro);
    }

    public function show($id)
    {

        $programme = ProgrammeModel::find($id);
        return new ProgrammesRessource($programme);
    }


    public function add(Request $request)
    {
        /*
         * Validation des inputs
         */
        $validator = Validator::make(
            $request->all(),
            [
                'id_user' => 'required|integer',
                'id_salle_de_sport' => 'required|integer',
                'id_seance' => 'required|integer',
                'name' => 'required|string',
                'difficulte' => 'required|string',
                'nbre_seance_semaine' => 'required|string',
                'prix' => 'required|string',
                'id_image' => 'required|integer'
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $donneesBdd = ProgrammeModel::create(
            $validator
        )->save();

        return $validator;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_user' => 'required|integer',
                'id_salle_de_sport' => 'required|integer',
                'id_seance' => 'required|integer',
                'name' => 'required|string',
                'difficulte' => 'required|string',
                'nbre_seance_semaine' => 'required|string',
                'prix' => 'required|string',
                'id_image' => 'required|integer'
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $dataProgramme = ProgrammeModel::find(1)
            ->where('id', '=', $id)
            ->first();

        if (isset($dataProgramme)) {
            $dataProgramme->id_user = $validator['id_user'];
            $dataProgramme->id_salle_de_sport = $validator['id_salle_de_sport'];
            $dataProgramme->id_seance = $validator['id_seance'];
            $dataProgramme->name = $validator['name'];
            $dataProgramme->difficulte = $validator['difficulte'];
            $dataProgramme->nbre_seance_semaine = $validator['nbre_seance_semaine'];
            $dataProgramme->prix = $validator['prix'];
            $dataProgramme->image = $validator['image'];

            $dataProgramme->save();
        }

        return $dataProgramme;
    }

    public function delete($id)
    {
        $status = ProgrammeModel::destroy($id) ? "ok" : "nok";
        return $status;
    }

    public function clientHasProgramme(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'user' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $programme = ProgrammeModel::where('id', '=', $validator['id'])->first()->id;
        $client = User::where('id', '=', $validator['user'])->first();

        if (count($client->programme) == 0) {
            $toToggle = $client->programme()->toggle($programme);
            return $toToggle;
        }
        else {
            $client->programme()->detach($client->programme[0]->id);
            $toAttach = $client->programme()->attach($programme);
            return $client->programme[0];
        }
    }

    Public function deleteProgramme(Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                'user' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $client = User::where('id', '=', $validator['user'])->first();

         if (!count($client->programme) == 0) {$client->programme()->detach($client->programme[0]->id);}
        return $client;
    }
}
