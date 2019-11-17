<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleBeat extends Model
{

      use SoftDeletes;
   protected $table = 'beat_schedules';
   protected $dates = ['deleted_at'];

   protected $fillable = [
  'beat_id','member_id','police_id','from_date','to_date','frequency','no_of_visits'
  ];
    
     
}