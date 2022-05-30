<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Regions;
use App\Http\Middleware\Communes;
use App\Http\Middleware\Create;
use App\Http\Middleware\Login;
use App\Http\Middleware\TokenTime;

//Crear un nuevo token de usuario
Route::middleware('api')->post('/login' , [App\Http\Controllers\LoginController::class, 'authenticate']);


Route::middleware(['api', TokenTime::class])->group(function () {

    try {
        
        Route::middleware([Create::class ,Regions::class, Communes::class, Login::class])->post('/customer/add' , 
        [App\Http\Controllers\CustomersController::class, 'create']);

        Route::get('/customers' , [App\Http\Controllers\CustomersController::class, 'customers']);
        Route::get('/customer/{param}' , [App\Http\Controllers\CustomersController::class, 'customer']);
        Route::delete('/customer/{param}' , [App\Http\Controllers\CustomersController::class, 'delete']);

    } catch (\Exception $ex) {
        \Log::debug('Test var fails ' . $e->getMessage());
    }
    

});
