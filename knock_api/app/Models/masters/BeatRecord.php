<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeatRecord extends Model
{

      use SoftDeletes;
   protected $table = 'beat_records';
   protected $dates = ['deleted_at'];

   protected $fillable = [
  'beat_id','memeber_id','lattitude','longitude','date','time','remark',
  ];
    
     
}