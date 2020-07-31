<?php

namespace App\Http\Controllers;

use App\SalleDeSportModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SallesController extends Controller
{
    public function index(Request $request, $id)
    {
        $dataSalle = SalleDeSportModel::where('id_user', '=', $id)->get();
        return $dataSalle;
    }

    public function listeClients(Request $request)
    {
        $gerant = $request->user();
        $salleDeSport = SalleDeSportModel::where('id_user', '=', $gerant->id)->first();
        $salleUser = $salleDeSport->client;
        return $salleUser;
        
    }

    public function updateRoom(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'lieu' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();
        $salleDeSport = SalleDeSportModel::find($id);
        $salleDeSport->name = $validator['name'];
        $salleDeSport->lieu = $validator['lieu'];
        $salleDeSport->save();
        return $salleDeSport;
    }

    public function getClients(Request $request)
    {
        $getClients = User::where('id_role', '=', 2)->get();
        return $getClients;
    }

    public function updateHoure(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'horaire' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $salleDeSport = SalleDeSportModel::find($id);
        $salleDeSport->horaire = $validator['horaire'];
        $salleDeSport->save();
        return $salleDeSport;
    }
}
