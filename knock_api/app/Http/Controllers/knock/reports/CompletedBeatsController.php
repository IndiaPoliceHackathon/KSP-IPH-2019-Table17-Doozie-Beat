<?php

namespace App\Http\Controllers\knock\reports;
use App\Http\Controllers\Controller;
use App\Models\masters\Supplier;
use Auth;
use DB;
use Illuminate\Http\Request;
use Redirect;

class CompletedBeatsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$my_schedules=DB::table('beat_schedules as bs')->join('users as u','u.id','bs.police_id')->join('beat_members as bm','bm.id','bs.member_id')->join('beat_member_types as bmt','bmt.id','bm.beat_member_type_id')->join('beats as b','b.id','bs.beat_id')->get();

		return view('knock.reports.completed_beats.index')->with('my_schedules',$my_schedules);
	}

	 
}
