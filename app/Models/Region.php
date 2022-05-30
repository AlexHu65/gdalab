<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $visible = ['description'];
    protected $primaryKey = 'id_reg'; 


    public function customers()
    {
        return $this->hasMany(Customer::class, 'id_reg', 'id_reg');
    }
}
