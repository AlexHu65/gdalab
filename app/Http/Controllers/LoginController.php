<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;


class LoginController extends Controller
{

    /**
    * @bodyParam email string required The id of the user. Example: alejandrotsu23@gmail.com
    * @bodyParam password string Passoword para generar el login. Example: 123456
    */
    public function authenticate(Request $request){

        try {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {

                //Si logro hace el login de usuario
                $user = User::where(['email' => $request->email])->first();
                if($user){
                    //se le agrega al token 1 hour para poderlo usar
                    $user->token = \Hash::make($request->email . Carbon::now() . \Str::random(200, 500));
                    // agregamos 1 hora al tiempo de vida del token
                    $user->email_token_at = Carbon::now()->addHour();
                    $user->save();
                    return response(['status' => true, 'data' => ['token' => $user->token]]); 
                }
            }

        } catch (\Exception $ex) {
            return response(['status' => false, 'data' => ['msg' => $ex->getMessage()]]); 
        }

        return response(['status' => false, 'data' => ['msg' => 'Error al generar token']]); 

    }
}
