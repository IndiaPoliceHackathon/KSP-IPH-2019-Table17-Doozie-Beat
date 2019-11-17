<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{

      use SoftDeletes;
   protected $table = 'designations';
   protected $dates = ['deleted_at'];

   protected $fillable = [
  'name','description'
  ];
    
     
}