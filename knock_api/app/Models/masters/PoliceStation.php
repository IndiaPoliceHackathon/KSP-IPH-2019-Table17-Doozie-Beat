<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoliceStation extends Model
{
    use SoftDeletes;

   protected $dates = ['deleted_at'];
   protected $table = 'police_stations';
    protected $fillable = [
   'police_station_name',
   'address',
   'no_of_polices',
   'no_of_beat_routes',
   'phone_no',
   ];
}
