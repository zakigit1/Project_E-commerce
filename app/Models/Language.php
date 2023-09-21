<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table='languages';
    protected $guarded=[];

    public $timestamp=True;


    //Local Scope :
    public function scopeSelection($query){

        return $query ->select('id','name','abbr','direction','active');

    }



    //Get :
    // public function getActiveAttribute($val){

    //     // return $val = ($val == 1) ? "Active" :  "Inactive" ;

    //     if($val == 1) {
    //         return "Active"  ;
    //     }elseif($val == 0){
    //         return "Inactive";
    //     }

    // }


    //Methods :
    public function getActive(){

        return $this-> active == 1 ? "Active" : "Inactive" ;
    }


    //Set :
    public function setNameAttribute($val){

        $this->attributes['name']=ucfirst($val);

    }



}
