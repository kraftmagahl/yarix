<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuln extends Model
{

    protected $table='webapp_vulns';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'Titolo_non_ufficiale',
       'Titolo_ufficiale',
       'OWASP',
       'Gravità',
       'Descrizione',
       'Soluzione',
       'PoC',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
     'id',
   ];
}
