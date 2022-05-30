<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Customer;
use Carbon\Carbon;

class CustomersController extends Controller
{

	/**
    * @bodyParam token string required token para user.
    */
	public function customers(Request $request){
		try {
			
			$customers = Customer::where(['status' => 'A'])
			->with(['region', 'commune'])
			->get(['name', 'last_name', 'address' , 'id_reg', 'id_com']);

			if($customers){
				foreach ($customers as $row => $value) {
					unset($value->id_com);
					unset($value->id_reg);
				}
			}
			
			return response(['status' => true, 'data' => ($customers ?  $customers : 'No se encontraron customers')]);

		} catch (\Exception $ex) {
			return response(['status' => false, 'data' => ['msg' => $ex->getMessage()]]); 
		}
	}

	/**
    * @header token
    */

	public function customer(Request $request){

		try {

			$customer = Customer::where(['status' => 'A', 'dni' => $request->param])
			->orWhere(['email' => $request->param])
			->with(['region', 'commune'])
			->first(['name', 'last_name', 'address' , 'id_reg', 'id_com']);

			if($customer){
				unset($customer->id_reg);
				unset($customer->id_com);
			}

			return response(['status' => true, 'data' => ($customer ?  $customer : 'No se encontro customer')]);

		} catch (\Exception $ex) {
			return response(['status' => false, 'data' => ['msg' => $ex->getMessage()]]); 
		}
	}

	
	//Elimina el costumer
	public function delete(Request $request){

		try {

			$customer = Customer::where(['dni' => $request->param])->first();

			if($customer){
				if($customer->status !== 'trash' ){
					$customer->status = 'trash';
					if($customer->save(['dni' => $customer->dni])){
						return response(['status' => true, 'data' => ['msg' => 'Registro eliminado']]); 
					}
				}
				return response(['status' => true, 'data' => ['msg' => 'Registro no existe']]); 
			}

		} catch (\Exception $ex) {
			return response(['status' => false, 'data' => ['msg' => $ex->getMessage()]]); 
		}
	}


	public function create(Request $request){

		try {
			
			$customer = new Customer;
			$customer->dni = $request->dni;
			$customer->id_reg = $request->region;
			$customer->id_com = $request->commune;
			$customer->name = $request->name;
			$customer->last_name = $request->last_name;
			$customer->email = $request->email;
			$customer->address = $request->address;
			$customer->date_reg = Carbon::now();

			if($customer->save()){
				return response(['status' => true, 'data' => ['msg' => 'Registro guardado']]); 
			}

		} catch (\Exception $ex) {
			return response(['status' => false, 'data' => ['msg' => $ex->getMessage()]]); 
		}

		return response(['status' => true, 'data' => 'Registro no guardado']); 
	}
}
