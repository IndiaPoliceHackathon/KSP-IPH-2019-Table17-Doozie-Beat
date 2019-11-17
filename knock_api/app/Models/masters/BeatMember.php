<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeatMember extends Model
{

      use SoftDeletes;
   protected $table = 'beat_members';
   protected $dates = ['deleted_at'];

   protected $fillable = [
  'beat_id','beat_member_type_id','contact_name','contact_number','address','photo','lat','longi'
  ];
    
     
}