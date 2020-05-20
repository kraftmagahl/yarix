<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuln extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'titolo ufficiale',
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
     
   ];
}
