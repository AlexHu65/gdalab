<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni'; 
    public $timestamps = false;

    public function region(){
        return $this->hasOneThrough(Region::class, Customer::class, 'id_reg', 'id_reg', 'id_reg', 'id_reg');
    }

    public function commune(){
        return $this->hasOneThrough(Commune::class, Customer::class, 'id_com', 'id_com', 'id_com', 'id_com');
    }

}
