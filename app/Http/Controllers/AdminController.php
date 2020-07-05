<?php

namespace App\Http\Controllers;

use App\Http\Resources\SallesDeSportRessource;
use App\Mail\Contact;
use App\SalleDeSportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.dashboard');
    }

    public function contact(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
                'client' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        
        Mail::to($validator['email'])->send(new Contact([
            'nom' => $validator['name'],
            'email' => 'admin@gmail.com',
            'message' => $validator['message'],
        ]));

         // if client répond positivement, salle_de_sport_has_client

        $gerant = $request->user();
        $salleDeSport = SalleDeSportModel::where('id_user', '=', $gerant->id)->first();
        $salleUser = $salleDeSport->client()->find($validator['client']);
        if(isset($salleUser)) {
            return 'l\'utilisateur est déjà dans la salle de sport';

        } else {
            $salleDeSport->client()->attach($validator['client']);
        }
       

        

    }
}
