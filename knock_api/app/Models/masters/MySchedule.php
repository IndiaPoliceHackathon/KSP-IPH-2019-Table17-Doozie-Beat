<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MySchedule extends Model
{

      use SoftDeletes;
   protected $table = 'my_schedules';
   protected $dates = ['deleted_at'];
   protected $primaryKey = 'my_schedule_id';
   protected $fillable = [
  'beat_schedule_id','date','done'
  ];
    
     
}