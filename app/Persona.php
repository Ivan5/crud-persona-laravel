<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //Se registra un arrreglo de los campos que se pueden guardar dentro de la tabla para evitar confictos
    protected $fillable = ['Nombre','Ape_Pat','Ape_Mat','RFC','CURP','Fecha_Nacimiento','Avatar'];

}
