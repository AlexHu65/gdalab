<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{

    protected $visible = ['description'];
    protected $primaryKey = 'id_com'; 


    use HasFactory;
}
