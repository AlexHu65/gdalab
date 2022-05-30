<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Create
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
            'region' => 'required',
            'commune' => 'required',
            'email' => 'required|email',
            'dni' => 'required|min:10',
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'token' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response(['status' => false, 'data' => $validator->messages()]); 
        }

        return $next($request);
    }
}
