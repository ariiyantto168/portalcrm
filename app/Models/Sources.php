<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sources extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'sources';
  protected $primaryKey = 'idsources';

  protected $fillable = [
    'name',
  ];

  protected $casts = [
       'active' => 'boolean'
  ];

  public function leads()
  {
    return $this->hasMany('App\Models\Leads', 'idleads');
  }
}
