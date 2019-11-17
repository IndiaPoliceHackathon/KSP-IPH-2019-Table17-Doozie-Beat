<?php

namespace App\Http\Controllers\knock\masters;
use DB;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Models\masters\Supplier;
use App\Http\Controllers\Controller;
use App\Models\masters\PoliceStation;

class PoliceStationController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$police_stations = DB::table('police_stations AS c')
			->select('c.*')
			->orderby('c.police_station_name')
			->paginate(100);

		return view('knock.masters.police_station.index')->with('police_stations', $police_stations);
	}

	 

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('knock.masters.police_station.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// dd($request->all());
		$designation=PoliceStation::create($request->all());
		// $police_station->police_station_name=$request->police_station_name;
		// $police_station->address=$request->address;
		// $police_station->no_of_polices=$request->no_of_polices;
		// $police_station->no_of_beat_routes=$request->no_of_beat_routes;
		// $police_station->phone_no=$request->phone_no;
		// $police_station->save();
		return redirect()->route('police_station.index')->with('message', 'Successfully Added')->with('er_type', 'success');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$customer = DB::table('police_stations as c')
			->join('states as s', 's.id', '=', 'c.state_region')
			->join('countries as co', 'co.id', '=', 's.country_id')
			->select('c.*', 's.state_name', 'co.country_name', 'co.sortname')
			->where('c.id', $id)
			->first();

		return view('knock.masters.police_station.show')->with('customer', $customer);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$customer = DB::table('police_stations as c')
			->join('states as s', 's.id', '=', 'c.state_region')
			->join('countries as co', 'co.id', '=', 's.country_id')
			->select('c.*', 's.state_name', 's.country_id', 'co.country_name', 'co.sortname')
			->where('c.id', $id)
			->where('c.deleted_at', '=', NULL)
			->first();

		if ($customer) {
			$states = DB::table('states')->where('country_id', $customer->country_id)->select('state_name', 'id')->get();
			return view('knock.masters.police_station.edit')->with('customer', $customer)->with('states', $states);
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
		$customer = Supplier::where('id', '=', $id)->first();
		if ($request->urd == 'on') {
			$request['urd'] = 1;
		} else {
			$request['urd'] = 0;
		}
		$request['state_region'] = $request->state_id;
		$request['updated_by'] = Auth::user()->id;
		$customer->update($request->all());

		return redirect()->route('knock.masters.police_station.index')->with('message', 'Successfully Updated')->with('er_type', 'success');
	}

	public function police_stationShipmentAddress($id) {
		$address = Supplier::where('id', $id)->first();
		if ($address) {
			$shipment_address = DB::table('police_station_shipment_address as csa')
				->join('police_stations as c', 'csa.police_station_id', '=', 'c.id')
				->leftjoin('states as s', 's.id', '=', 'csa.state_id')
				->leftjoin('countries as co', 'co.id', '=', 'csa.country_id')
				->leftjoin('users AS u', 'csa.created_by', '=', 'u.id')
				->leftjoin('users AS u1', 'csa.updated_by', '=', 'u1.id')
				->where('c.id', '=', $id)
				->select('csa.*', 'co.country_name', 's.state_name', 'c.police_station_name', 'u.username as cb_name', 'u1.username as ub_name')
				->orderby('csa.id', 'DESC')
				->get();

			return view('knock.masters.police_station.shipment_address')->with('shipment_address', $shipment_address)->with('address', $address);
		} else {
			return redirect()->route('knock.masters.police_station.index')->with('message', 'Cannot Add Shipping Address for Deactivated Supplier')->with('er_type', 'danger');
		}
	}

	public function getFilteredSupplier(Request $request) {
		$customer_details = DB::table('police_stations as c')
			->join('states as s', 's.id', '=', 'c.state_region')

			->where(function ($q) use ($request) {
				if ($request->police_station_name) {
					$q->Where('c.police_station_name', 'like', '%' . $request->police_station_name . '%');
				}
			})

			->where(function ($q) use ($request) {
				if (strlen($request->phone_number) > 0) {
					$q->Where('c.phone_number', '=', $request->phone_number);
				}
			})

			->where(function ($q) use ($request) {
				if (strlen($request->city)) {
					$q->Where('c.city', 'like', '%' . $request->city . '%');
				}
			})

			->where(function ($q) use ($request) {
				if ($request->address) {
					$q->Where('address', 'like', '%' . $request->address . '%');
				}
			})

			->select('c.*', 's.state_name')
			->orderby('c.police_station_name')
			->get();

		return response()->json(array('customer_details' => $customer_details));
	}

	public function deactivate($id) {
		$police_station = Supplier::where('id', '=', $id)->first();
		if ($police_station) {
			$police_station->delete();
			return redirect()->route('knock.masters.police_station.index')->with('message', 'Successfully Deactivated')->with('er_type', 'danger');
		} else {
			$police_station = Supplier::onlyTrashed()->where('id', '=', $id)->first();
			$police_station->restore();
			return redirect()->route('knock.masters.police_station.index')->with('message', 'Successfully Activated')->with('er_type', 'success ');
		}
	}
}