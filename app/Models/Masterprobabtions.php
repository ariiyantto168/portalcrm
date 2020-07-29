<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterprobabtions extends Model
{
    use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'masterprobations';
  protected $primaryKey = 'idmasterprobabtions';

  protected $fillable = [
    'name'
  ];
}
