<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industries extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
  
    protected $table = 'industries';
    protected $primaryKey = 'idindustries';
  
    protected $fillable = [
        'name',
    ];

    public function leads()
    {
        return $this->hasMany('App\Models\Leads', 'idleads');
    }
}
