<div class="col-md-4">
  <div class="form-group @if($errors->first('police_station_id')) has-error @endif">
   {!!Form::label('police_station_id','Police Station Name *')!!}
   {!!Form::select('police_station_id',$police_stations,Input::old('police_station_id'),['class' => 'form-control required','id'=>'police_station_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Station Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('police_station_id') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('designation_id')) has-error @endif">
   {!!Form::label('designation_id','Designation *')!!}
   {!!Form::select('designation_id',$designations,Input::old('designation_id'),['class' => 'form-control required','id'=>'designation_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Designation","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('designation_id') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('police_name')) has-error @endif">
   {!!Form::label('police_name','Police Name *')!!}
   {!!Form::text('police_name',Input::old('police_name'),['class' => 'form-control required','id'=>'police_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('police_name') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('address')) has-error @endif">
    {!! Form::label('address', 'Address') !!}
    {!! Form::textarea('address', Input::old('address'), ['class' => 'form-control email','id'=>'address', "data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Email","data-placement"=>"bottom"]) !!}
    <small class="text-danger">{{ $errors->first('address') }}</small>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('collar_no')) has-error @endif">
   {!!Form::label('collar_no','Police ID')!!}
   {!!Form::text('collar_no',Input::old('collar_no'),['class' => 'form-control required','id'=>'collar_no',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police No Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('collar_no') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('file_name')) has-error @endif">
   {!!Form::label('file_name','Attach Photo')!!}
   {!!Form::file('file_name',Input::old('file_name'),['class' => 'form-control required','id'=>'file_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Attach Photo","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('file_name') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('phone_number')) has-error @endif">
   {!!Form::label('phone_number','Phone No')!!}
   {!!Form::text('phone_number',Input::old('phone_number'),['class' => 'form-control required','id'=>'phone_number',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Phone No","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('phone_number') }}</small>
 </div>
</div>