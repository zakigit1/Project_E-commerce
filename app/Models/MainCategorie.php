<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategorie extends Model
{
    use HasFactory;

    protected $table='languages';
    protected $guarded=[];

    public $timestamp=True;


}
