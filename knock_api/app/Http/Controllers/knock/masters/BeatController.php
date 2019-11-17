<?php

namespace App\Http\Controllers\knock\masters;
use DB;
use Auth;
use Redirect;
use App\Models\masters\Beat;
use Illuminate\Http\Request;
use App\Models\masters\Supplier;
use App\Models\masters\BeatMember;
use App\Http\Controllers\Controller;

class BeatController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$beats = DB::table('beats AS b')->join('police_stations as ps','ps.id','b.police_station_id')->select('b.*','ps.police_station_name')
			->orderby('b.beat_name')
			->get();
			foreach ($beats as $beat) {
				$beat->count=DB::table('beat_members')->where('beat_id',$beat->id)->count();
			}

		return view('knock.masters.beat.index')->with('beats', $beats);
	}

	public function getSpecificStates(Request $request) {
		$states = DB::table('states')
			->where('country_id', $request->country_id)
			->get();

		return response()->json(array('states' => $states));
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
		return view('knock.masters.beat.create')->with('police_stations',$police_stations);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// dd($request->all());
		 Beat::create($request->all());
		return redirect()->route('beat.index')->with('message', 'Successfully Added')->with('er_type', 'success');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//  dd($id);
		$beat = DB::table('beats AS b')->join('police_stations as ps','ps.id','b.police_station_id')->select('b.*','ps.police_station_name')
		->where('b.id',$id)
		->orderby('b.beat_name')
		->first();

		// $beats = DB::table('beats AS c')
		// 	->select('c.*')
		// 	->orderby('c.beat_name')
		// 	->get()->pluck('beat_name','id');

		$beat_member_types=DB::table('beat_member_types as dt')
			->select('dt.*')
			->orderby('dt.id','DESC')
			->get()->pluck('beat_memeber_type_name','id');

		return view('knock.masters.beat.show')->with('beat', $beat)->with('beat_member_types', $beat_member_types);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$members = DB::table('beat_members as bm')
			->join('beat_member_types as bmt', 'bmt.id', '=', 'bm.beat_member_type_id')
			->where('bm.beat_id', $id)
			 
			->get();
		// dd($members);
		if ($members) {
			 
			return view('knock.masters.beat.edit')->with('members', $members);
		} else {
			return redirect()->route('knock.masters.police_station.index')->with('message', 'Cannot Edit Deactivated Customer')->with('er_type', 'danger');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// dd($request->all());	
		if ($request->file('file_name')) {
			$file = $request->file('file_name');

			$FilePath = 'knock/images/tmp/';
			$FileName = time() . '-' . $file->getClientOriginalName();
			$file = $file->move($FilePath, $FileName);
			$path = $FilePath . $FileName;
			$request['photo'] = '/'.$path;
			// $tmpFilePath = 'pwf/images/tmp/';

			// unlink($path);
		}
		$request['beat_id'] = $id;
		 
		$user=BeatMember::create($request->all());
		return redirect()->route('beat.index')->with('message', 'Successfully Added')->with('er_type', 'success');
	}

	 
}
