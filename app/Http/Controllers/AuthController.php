<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersRessource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request) {
        $login = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($login)) {
            return response(['message' => 'login invalide']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return new UsersRessource(Auth::user($accessToken), $accessToken);
    }

    public function logout() {
        log::debug('Logout');
        $accessToken = Auth::user()->token();

        $accessToken->revoke();

        return response('Vous êtes déco', 200);
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name'=>'required',
            'surname' => 'required',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);   

        $user = new User;
        $user->name = $validator['name'];
        $user->surname = $validator['surname'];
        $user->email = $validator['email'];
        $user->password = bcrypt($request->password);
        $user->id_role = 2;
        $user->save();

        return response()->json(['status' => 'success'], 200);

    }
}
