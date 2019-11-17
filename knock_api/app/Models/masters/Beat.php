<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beat extends Model
{

      use SoftDeletes;
   protected $table = 'beats';
   protected $dates = ['deleted_at'];

   protected $fillable = [
  'beat_name','police_station_id','minimum_hostspots','closed'
  ];
    
     
}