<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UsersRessource;
use App\SalleDeSportModel;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UsersRessource::collection($users);
    }

    public function user(Request $request, $id)
    {
       $user = User::where('id', '=', $id)->get();
       return UsersRessource::collection($user);
    }

}
