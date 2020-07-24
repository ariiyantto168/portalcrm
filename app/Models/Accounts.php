<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
    use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'accounts';
  protected $primaryKey = 'idaccounts';

  protected $fillable = [
    'name','website','type','billingaddres','shippingaddres','description'
  ];
}
