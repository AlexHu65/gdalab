<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TokenTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $rules = [
            'token' => 'required'
        ];

        $tokenHeader = false;

        if($request->header('token')){
            $validator = Validator::make($request->header(), $rules);
            $tokenHeader = true;
        }else{
            $validator = Validator::make($request->all(), $rules);
        }


        if ($validator->fails()) {
            return response(['status' => false, 'data' => $validator->messages()]); 
        }

        $user = User::where(['token' => ($tokenHeader ? $request->header('token') : $request->token)])->first();
        //buscamos el usuario con el token
        if($user){
            if(Carbon::parse($user->email_token_at)->format('Y-m-d H:i:s') < Carbon::now()->format('Y-m-d H:i:s')){
               return response(['status' => true, 'data' => ['msg' => 'Token no valido por tiempo de expiracion']]);
            }
        }else{
            return response(['status' => true, 'data' => ['msg' => 'Token no valido']]);
        }

        return $next($request);

    }
}
