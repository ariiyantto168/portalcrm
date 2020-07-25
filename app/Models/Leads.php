<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;



class Leads extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'leads';
  protected $primaryKey = 'idleads';

  protected $fillable = [
    'gelar','firstname','lastname','account','tittle','website','statusleads','tipemoney','amount','alamat','description',
  ];


   public function sources()
   {
     return $this->belongsTo('App\Models\Sources', 'idsources');
   }

   public function industries()
   {
     return $this->belongsTo('App\Models\Industries', 'idindustries');
   }

   public function users()
  {
    return $this->belongsTo('App\Models\User','idusers');
  }




}
