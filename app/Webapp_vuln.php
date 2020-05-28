<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webapp_vuln extends Model
{
    protected $dates=['deleted_at'];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'Titolo_ufficiale',
       'OWASP',
       'Gravità',
       'Descrizione',
       'Soluzione',
       'PoC',
       'Descrizione_en',
       'Soluzione_en',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
   ];
}
