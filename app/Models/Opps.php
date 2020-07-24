<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opps extends Model
{
    use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'opps';
  protected $primaryKey = 'idopps';

  protected $fillable = [
    'name','stage','tipemoney','amount','probality','description'
  ];
}
