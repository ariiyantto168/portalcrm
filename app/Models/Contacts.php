<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'contacts';
  protected $primaryKey = 'idcontacts';

  protected $fillable = [
    'gelar','firstname','lastname','account','alamat','description',
  ];
}
