<?php

namespace App\Http\Controllers\knock\reports;

use Illuminate\Http\Request;
use App\Models\masters\Designation;
use App\Models\Notification;
use App\Models\AccessLog;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;

class PendingBeatsController extends Controller
{

    public function __construct(){
        
    }

    public function index()
    {


        $my_schedules=DB::table('beat_schedules as bs')->join('users as u','u.id','bs.police_id')->join('beat_members as bm','bm.id','bs.member_id')->join('beat_member_types as bmt','bmt.id','bm.beat_member_type_id')->join('beats as b','b.id','bs.beat_id')->where('bs.closed',0)->get();
        

        return view('knock.reports.pending_beats.index')->with('my_schedules',$my_schedules);
    }




     


}
