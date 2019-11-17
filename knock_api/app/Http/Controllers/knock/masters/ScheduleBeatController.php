<?php

namespace App\Http\Controllers\knock\masters;
use DB;
use Auth;
use App\User;
use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\masters\Supplier;
use App\Models\masters\MySchedule;
use App\Http\Controllers\Controller;
use App\Models\masters\ScheduleBeat;

class ScheduleBeatController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$frequencies=array('1'=>'Daily','2'=>'Weekly','3'=>'Monthly');
		$beat_schedules = DB::table('beat_schedules AS bs')->join('users as p','p.id','bs.police_id')->join('police_stations as ps','ps.id','p.police_station_id')->join('designations as d','d.id','p.designation_id')->join('beats as b','b.id','bs.beat_id')->orderby('bs.id')->join('beat_members as bm','bm.id','bs.member_id')->orderby('bs.id')->get();

		// dd($beat_schedules);

		return view('knock.masters.schedule_beat.index')->with('beat_schedules', $beat_schedules)->with('frequencies', $frequencies);
	}

	 

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$police_stations = DB::table('police_stations AS c')
			->select('c.*')
			->orderby('c.police_station_name')
			->get()->pluck('police_station_name','id');
		
		$members = DB::table('users AS p')
			->select('p.*')
			->orderby('p.police_name')
			->get()->pluck('police_name','id');
		
			$beat_members = DB::table('beat_members AS p')
			->select('p.*')
			->orderby('p.contact_name')
			->get()->pluck('contact_name','id');

			$beats = DB::table('beats AS p')
			->select('p.*')
			->orderby('p.beat_name')
			->get()->pluck('beat_name','id');
		
		$frequencies=array('1'=>'Daily','2'=>'Weekly','3'=>'Monthly');

		return view('knock.masters.schedule_beat.create')->with('police_stations',$police_stations)->with('members',$members)->with('frequencies',$frequencies)->with('beats',$beats)->with('beat_members',$beat_members);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// dd($request->all());
		foreach($request->member_ids as $member_id){
		$request['member_id'] = $member_id;
		$schedule_beat=ScheduleBeat::create($request->all());
		$no=$request->no_of_visits;
		while($no--){
			$from=Carbon::parse($request->from_date);
			$to=Carbon::parse($request->to_date);
			// dd($request->frequency);
			if($request->frequency==1){
				while($from->lessThanOrEqualTo($request->to_date)){
					// edited at is newer than created at
					// dd($schedule_beat->id);
					$my_schedule=new MySchedule;
					$my_schedule->schedule_date=$from->toDateString();
					$my_schedule->beat_schedule_id=$schedule_beat->id;
					$my_schedule->save();

					$from = $from->addDays(1);
				}
			}
			if($request->frequency==2){
				$from=Carbon::parse($request->from_date);
				$from = $from->addDays(rand(1,5));
				$to=Carbon::parse($request->to_date);
				while($from->lessThanOrEqualTo($request->to_date)){
					// edited at is newer than created at
					// dd($schedule_beat->id);
					$my_schedule=new MySchedule;
					$my_schedule->schedule_date=$from->toDateString();
					$my_schedule->beat_schedule_id=$schedule_beat->id;
					$my_schedule->save();

					$from = $from->addDays(7);
				}
			}
			if($request->frequency==3){
				$from=Carbon::parse($request->from_date);
				$from = $from->addDays(rand(1,27));
				$to=Carbon::parse($request->to_date);
				while($from->lessThanOrEqualTo($request->to_date)){
					// edited at is newer than created at
					// dd($schedule_beat->id);
					$my_schedule=new MySchedule;
					$my_schedule->schedule_date=$from->toDateString();
					$my_schedule->beat_schedule_id=$schedule_beat->id;
					$my_schedule->save();

					$from = $from->addMonth();
				}
			}
		}
		}

		return redirect()->route('schedule_beat.index')->with('message', 'Successfully Added')->with('er_type', 'success');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		 

		return view('knock.masters.police_station.show');
	}

	 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		 
	}

	 

	 

	 
}
