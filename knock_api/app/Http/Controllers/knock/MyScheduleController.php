<?php

namespace App\Http\Controllers\knock;
use DB;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Models\masters\Supplier;
use App\Models\masters\BeatRecord;
use App\Http\Controllers\Controller;

class MyScheduleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$my_schedules=DB::table('beat_schedules as bs')->join('users as u','u.id','bs.police_id')->join('beat_members as bm','bm.id','bs.member_id')->join('beat_member_types as bmt','bmt.id','bm.beat_member_type_id')->join('beats as b','b.id','bs.beat_id')->orderBy('bs.id','ASC')->select('bs.from_date','bs.to_date','b.beat_name','bs.no_of_visits','bs.id')->get();
		// dd($my_schedules);
		return view('knock.my_schedule.index')->with('my_schedules',$my_schedules);
	}

	public function show($id) {
		$my_schedules=DB::table('beat_schedules as bs')->join('users as u','u.id','bs.police_id')->join('beat_members as bm','bm.id','bs.member_id')->join('beat_member_types as bmt','bmt.id','bm.beat_member_type_id')->join('beats as b','b.id','bs.beat_id')->join('my_schedules as ms','ms.beat_schedule_id','bs.id')->where('bs.id',$id)->orderBy('schedule_date','ASC')->get();

		return view('knock.my_schedule.show')->with('my_schedules',$my_schedules);

		
	}

	public function store(Request $request) {
		BeatRecord::create($request->all());
		return redirect()->route('my_schedule.index');

		
	}

	 
}
