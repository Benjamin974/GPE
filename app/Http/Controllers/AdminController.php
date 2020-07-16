<?php

namespace App\Http\Controllers;

use App\Http\Resources\SallesDeSportRessource;
use App\Http\Resources\UsersRessource;
use App\Mail\Contact;
use App\SalleDeSportModel;
use App\User;
use Illuminate\Database\Eloquent\Builder;
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
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required',
                'message' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        Mail::to($validator['email'])->send(new Contact([
            'nom' => $validator['nom'],
            'email' => 'admin@gmail.com',
            'message' => $validator['message'],
        ]));

        $dataUser = new User;
        $dataUser->name = $validator['nom'];
        $dataUser->surname = $validator['prenom'];
        $dataUser->email = $validator['email'];
        $dataUser->password = bcrypt("user");
        $dataUser->id_role = 2;
        $dataUser->save();

        $newUser = User::where('name', '=', $validator['nom'])->get();
        // if client répond positivement, salle_de_sport_has_client

        $gerant = $request->user();
        $salleDeSport = SalleDeSportModel::where('id_user', '=', $gerant->id)->first();
        $salleUser = $salleDeSport->client()->find($newUser[0]->id);
        if (isset($salleUser)) {
            return 'l\'utilisateur est déjà dans la salle de sport';
        } else {
            $salleDeSport->client()->attach($newUser[0]->id);
            return 'l\'utilisateur à été ajouté dans la salle de sport';
        }
    }

    public function deleteUser(Request $request, $id)
    {
        $getUsers = User::where('id', '=', $id)->get();
        foreach ($getUsers as $getUser) {
            $userId = $getUser->id;
            $getProgrammesOfUser = $getUser->programme()->detach();
            $getSalleDeSport = SalleDeSportModel::whereHas('client', function (Builder $query) use ($userId) {
                $query->where('id', '=', $userId);
            })->first();
            $getSalleDeSportOfUser = $getSalleDeSport->client()->detach();
            if ($getSalleDeSportOfUser) {
                $ok = 'ok';
            } else {
                $erreur = 'erreur';
                return $erreur;
            }
            $getUser->delete();
            if ($getUser) {
                return $ok . "l'utilisateur a été supprimé";
            } else {
                return 'erreur';
            }
        }
    }
}
