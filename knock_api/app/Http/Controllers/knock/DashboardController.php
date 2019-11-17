<?php

namespace App\Http\Controllers\knock;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index() {
		return view('knock.dashboard.index');
        
    }

    public function fapp($id) {
      $schedule=DB::table('beat_schedules as bs')->join('users as u','u.id','bs.police_id')->join('beat_members as bm','bm.id','bs.member_id')->join('beat_member_types as bmt','bmt.id','bm.beat_member_type_id')->join('beats as b','b.id','bs.beat_id')->join('my_schedules as ms','ms.beat_schedule_id','bs.id')->where('ms.my_schedule_id',$id)->orderBy('schedule_date','ASC')->select('bs.beat_id','bs.member_id','bm.contact_name','bm.contact_number')->first();

      $checklists=DB::table('checklists')->get();
      // dd($schedule);
      return view('knock.dashboard.fapp')->with('id',$id)->with('schedule',$schedule)->with('checklists',$checklists);
          
      }
    
    
}
