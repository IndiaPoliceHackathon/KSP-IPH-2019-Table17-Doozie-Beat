<?php

namespace App\Http\Controllers\knock\masters;

use Illuminate\Http\Request;
use App\Models\masters\Designation;
use App\Models\Notification;
use App\Models\AccessLog;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;

class DesignationController extends Controller
{

    public function __construct(){
        
    }

    public function index()
    {


        $designation=DB::table('designations as dt')->leftjoin('designations as rt','rt.id','=','dt.reporting_to')
        ->select('dt.*','rt.name as reporting_name')
        ->orderby('dt.id','DESC')
        ->get();
        // dd($designation);

        return view('knock.masters.designation.index')->with('designation',$designation);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//   dd($request->all());
        $designation=Designation::where('id','=',$request->id)->first();

        $check_designation=DB::table('designations')
        ->where('name','=',$request->name)
        ->first();

    // dd($check_designation);

        if($check_designation){

            return response()->json(1);

        }else{

             
            $designation=Designation::create($request->all());
            return response()->json(array('designation'=>$designation));  
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDesignation(Request $request)
    {
      $designation=Designation::where('id', '=', $request->id)->first();

      
      if($designation){

        $check_designation=DB::table('designations')
        ->where('name','=',$request->name)
        ->where('id','!=',$request->id)
        ->first();
        
        

        if($check_designation){

          return response()->json(1);

      }else{

          $request['updated_by']=Auth::user()->id;
          $request['name']=$request->name;
          $request['description']=$request->description;

          $designation->update($request->all());

          return redirect()->route('knock.masters.designation.index')->with('message','Designation Updated successfully')->with('er_type','success');
      }
  }
}


public function deactivate($id)
{
    $designation=Designation::where('id', '=', $id)->first();
    if($designation){
        $designation->delete();
        return redirect()->route('knock.masters.designation.index')->with('message','Designation Deactivated Successfully')->with('er_type','error');
    }else{
        $designation=Designation::onlyTrashed()->where('id', '=', $id)->first();
        $designation->restore();
        return redirect()->route('knock.masters.designation.index')->with('message','Designation Activated Successfully')->with('er_type','success');
    }
}


}
