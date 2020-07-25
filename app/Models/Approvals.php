<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Approvals extends Model
{
    use SoftDeletes;

  protected $table = 'approvals';
  protected $primaryKey = 'idapprovals';
  public $incrementing = false;

  protected $casts = [
    'seen' => 'boolestringan',
  ];

  protected $hidden = [
      'created_at','created_by',
      'updated_at','updated_by',
      'deleted_at','deleted_by'
  ];

  protected static function boot()
  {
      parent::boot();
  }

  public function leads()
  {
     return $this->belongsTo('App\Models\leads','idleads');
  }

  public function users()
  {
     return $this->belongsTo('App\Models\User', 'idusers');
  }



}
