<div class="col-md-4">
  <div class="form-group @if($errors->first('police_station_name')) has-error @endif">
   {!!Form::label('police_station_name','Police Station Name *')!!}
   {!!Form::text('police_station_name',Input::old('police_station_name'),['class' => 'form-control required','id'=>'police_station_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Station Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('police_station_name') }}</small>
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
  <div class="form-group @if($errors->first('no_of_polices')) has-error @endif">
   {!!Form::label('no_of_polices','No of Police Personel')!!}
   {!!Form::text('no_of_polices',Input::old('no_of_polices'),['class' => 'form-control required','id'=>'no_of_polices',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Police Station Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('no_of_polices') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('no_of_beat_routes')) has-error @endif">
   {!!Form::label('no_of_beat_routes','No of Beat Routes')!!}
   {!!Form::text('no_of_beat_routes',Input::old('no_of_beat_routes'),['class' => 'form-control required','id'=>'no_of_beat_routes',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter No of Beat Routes","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('no_of_beat_routes') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('phone_no')) has-error @endif">
   {!!Form::label('phone_no','Phone No')!!}
   {!!Form::text('phone_no',Input::old('phone_no'),['class' => 'form-control required','id'=>'phone_no',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Phone No","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('phone_no') }}</small>
 </div>
</div>