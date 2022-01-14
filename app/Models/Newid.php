<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Newid extends Authenticatable
{
    protected $fillable = ['documento', 'nombre', 'cola','ticket','atendido','created_at','updated_at'];


    public function cola1(){

     return DB::select('select id,created_at,ticket as ticket1 from newids where cola = ? order by id desc LIMIT 1', [1]);

    }

    public function cola2(){

     return DB::select('select id,created_at,ticket as ticket2 from newids where cola = ? order by id desc LIMIT 1', [2]);

    }



    public function updateCola1($now,$idCola1){

     return DB::UPDATE('UPDATE newids SET atendido="S", updated_at="'.$now.'" WHERE id<="'.$idCola1.'" and cola="1" and atendido="N"');

    }


    public function updateCola2($now,$idCola2){

     return DB::UPDATE('UPDATE newids SET atendido="S", updated_at="'.$now.'" WHERE id<="'.$idCola2.'" and cola="2" and atendido="N"');

    }

    public function obtenerNroPersonas1(){

     return DB::select('select count(id) as count1 from newids where cola=1 and atendido="N"');

    }


    public function obtenerNroPersonas2(){

     return DB::select('select count(id) as count2 from newids where cola=2 and atendido="N"');

    }

}
