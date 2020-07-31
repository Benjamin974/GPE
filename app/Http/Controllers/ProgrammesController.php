<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProgrammesRessource;
use App\ImagesModel;
use App\ProgrammeModel;
use App\SalleDeSportModel;
use App\SallesDeSportHasUsers;
use App\SeanceModel;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgrammesController extends Controller
{
    public function index()
    {
        $programmes = ProgrammeModel::all();
        return ProgrammesRessource::collection($programmes);
    }

    public function getProgrammesClients(Request $request) {
        
        $client = $request->user();
        $clientId = $client->id;
        $programmes = ProgrammeModel::with(['coach'])
        ->whereHas('salleDeSport.client', function (Builder $query) use ($clientId) {
            $query->where('id', '=', $clientId);
        })->get();

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
                'id_user' => 'required',
                'id_salle_de_sport' => 'required',
                'id_seance' => 'required',
                'name' => 'required',
                'difficulte' => 'required',
                'nbre_seance_semaine' => 'required',
                'id_image' => 'required',
                'id' => ''
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $programme = ProgrammeModel::with(['image', 'coach', 'salleDeSport', 'seance'])->find($validator['id']);
        if (!$programme) {
            $donneesBdd = new ProgrammeModel;
        } else {
            $donneesBdd = $programme;
        }

        $donneesBdd->name = $validator['name'];
        $donneesBdd->difficulte = $validator['difficulte'];
        $donneesBdd->nbre_seance_semaine = $validator['nbre_seance_semaine'];

        $coach = User::find($validator['id_user']);
        if (!$coach) {
            return 'err';
        }
        $donneesBdd->coach()->associate($coach);

        $salleDeSport = SalleDeSportModel::find($validator['id_salle_de_sport']);
        if (!$salleDeSport) {
            return 'err';
        }
        $donneesBdd->salleDeSport()->associate($salleDeSport);

        $seance = SeanceModel::find($validator['id_seance']);
        if (!$seance) {
            return 'err';
        }
        $donneesBdd->seance()->associate($seance);

        $image = ImagesModel::find($validator['id_image']);
        if (!$image) {
            return 'err';
        }
        $donneesBdd->image()->associate($image);
        // return $donneesBdd;
        $donneesBdd->save();
        
        return new ProgrammesRessource($donneesBdd);
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
        } else {
            $client->programme()->detach($client->programme[0]->id);
            $toAttach = $client->programme()->attach($programme);
            return $client->programme[0];
        }
    }

    public function deleteProgramme(Request $request)
    {

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

        if (!count($client->programme) == 0) {
            $client->programme()->detach($client->programme[0]->id);
        }
        return $client;
    }
}
