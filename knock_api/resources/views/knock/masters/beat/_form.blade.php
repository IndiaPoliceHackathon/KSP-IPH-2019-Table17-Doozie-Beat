<div class="col-md-4">
  <div class="form-group @if($errors->first('police_station_id')) has-error @endif">
   {!!Form::label('police_station_id','Police Station Name *')!!}
   {!!Form::select('police_station_id',$police_stations,Input::old('police_station_id'),['class' => 'form-control required','id'=>'police_station_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Station Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('police_station_id') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('beat_name')) has-error @endif">
    {!! Form::label('beat_name', 'Beat Name') !!}
    {!! Form::text('beat_name', Input::old('beat_name'), ['class' => 'form-control email','id'=>'beat_name', "data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Beat Name","data-placement"=>"bottom"]) !!}
    <small class="text-danger">{{ $errors->first('beat_name') }}</small>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('minimum_hostspots')) has-error @endif">
    {!! Form::label('minimum_hostspots', 'Minimum Hostspots') !!}
    {!! Form::text('minimum_hostspots', Input::old('minimum_hostspots'), ['class' => 'form-control email','id'=>'minimum_hostspots', "data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Minimum Hostspots","data-placement"=>"bottom"]) !!}
    <small class="text-danger">{{ $errors->first('minimum_hostspots') }}</small>
  </div>
</div>
