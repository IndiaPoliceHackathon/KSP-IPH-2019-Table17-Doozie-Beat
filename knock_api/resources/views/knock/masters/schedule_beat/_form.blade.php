<div class="col-md-4">
  <div class="form-group @if($errors->first('police_station_id')) has-error @endif">
   {!!Form::label('police_station_id','Police Station Name *')!!}
   {!!Form::select('police_station_id',$police_stations,Input::old('police_station_id'),['class' => 'form-control required','id'=>'police_station_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Station Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('police_station_id') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('beat_id')) has-error @endif">
   {!!Form::label('beat_id','Beat Name *')!!}
   {!!Form::select('beat_id',$beats,Input::old('beat_id'),['class' => 'form-control required','id'=>'beat_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Beat Name ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('beat_id') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('police_id')) has-error @endif">
   {!!Form::label('police_id','Police Personel *')!!}
   {!!Form::select('police_id',$members,Input::old('police_id'),['class' => 'form-control required','id'=>'police_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Personel","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('police_id') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('member_ids')) has-error @endif">
   {!!Form::label('member_ids','Beat Members *')!!}
   {!!Form::select('member_ids[]',$beat_members,Input::old('member_ids'),['class' => 'form-control required','id'=>'member_ids',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Beat Members","data-placement"=>"bottom","multiple"=>'multiple'])!!}
   <small class="text-danger">{{ $errors->first('member_ids') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('from_date')) has-error @endif">
   {!!Form::label('from_date','From Date *')!!}
   {!!Form::input('date','from_date',Input::old('from_date'),['class' => 'form-control required','id'=>'from_date',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter From Date","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('from_date') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('to_date')) has-error @endif">
   {!!Form::label('to_date','To Date *')!!}
   {!!Form::input('date','to_date',Input::old('to_date'),['class' => 'form-control required','id'=>'to_date',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter From Date","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('to_date') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('frequency')) has-error @endif">
   {!!Form::label('frequency','Frequency *')!!}
   {!!Form::select('frequency',$frequencies,Input::old('frequency'),['class' => 'form-control required','id'=>'frequency',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Personel","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('frequency') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('no_of_visits')) has-error @endif">
    {!! Form::label('no_of_visits', 'No of Visits') !!}
    {!! Form::text('no_of_visits', Input::old('no_of_visits'), ['class' => 'form-control email','id'=>'no_of_visits', "data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter No of Visits","data-placement"=>"bottom"]) !!}
    <small class="text-danger">{{ $errors->first('no_of_visits') }}</small>
  </div>
</div>
