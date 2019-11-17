@extends('knock.layouts.dashboard')

@section('title', 'Beat Member')

@section('page_title_sub', 'Add Beat Member')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View Supplier Details here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($beat,array('route' => array('beat.update', $beat->id), 'method' => 'PUT','files'=>true,'id'=>'view-form'))!!}

          <div class="col-md-4">
            <div class="form-group @if($errors->first('beat_member_type_id')) has-error @endif">
             {!!Form::label('beat_member_type_id','Type *')!!}
             {!!Form::select('beat_member_type_id',$beat_member_types,Input::old('beat_member_type_id'),['class' => 'form-control required','id'=>'beat_member_type_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Type","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('beat_member_type_id') }}</small>
           </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group @if($errors->first('contact_name')) has-error @endif">
             {!!Form::label('contact_name','Contact Name *')!!}
             {!!Form::text('contact_name',Input::old('contact_name'),['class' => 'form-control required','id'=>'contact_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Contact Name","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('contact_name') }}</small>
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
            <div class="form-group @if($errors->first('file_name')) has-error @endif">
             {!!Form::label('file_name','Attach Photo')!!}
             {!!Form::file('file_name',Input::old('file_name'),['class' => 'form-control required','id'=>'file_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Attach Photo","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('file_name') }}</small>
           </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group @if($errors->first('contact_number')) has-error @endif">
             {!!Form::label('contact_number','Phone No')!!}
             {!!Form::text('contact_number',Input::old('contact_number'),['class' => 'form-control required','id'=>'contact_number',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Phone No","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('contact_number') }}</small>
           </div>
          </div>

          <div class="col-md-4">
            <div class="form-group @if($errors->first('lat')) has-error @endif">
             {!!Form::label('lat','Latitude *')!!}
             {!!Form::text('lat',Input::old('lat'),['class' => 'form-control required','id'=>'lat',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Latitude","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('lat') }}</small>
           </div>
          </div>

          <div class="col-md-4">
            <div class="form-group @if($errors->first('longi')) has-error @endif">
             {!!Form::label('longi','Longititude *')!!}
             {!!Form::text('longi',Input::old('longi'),['class' => 'form-control required','id'=>'longi',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Longititude","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('longi') }}</small>
           </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12">
          <div id="mapCanvas" style="width:100%; height:250px;"></div>
            <div id="infoPanel" hidden>
              <b>Marker status:</b>
              <div id="markerStatus"><i>Click and drag the marker.</i></div>
              <b>Current position:</b>
              <div id="info"></div>
              <b>Closest matching address:</b>
              <div id="address"></div>
            </div>
          </div>
          
          
          <div class="clearfix"></div>
<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('beat.index')}}">{!! Form::button('Close', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-block btn-success btn-block']) !!}
  </div>
</div>
<div class="clearfix"></div><br>
{!!Form::close()!!}
</div>
</div><!-- /.box -->
</div><!-- /.col -->
</div>
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">
   var latitude=0;
var longitude=0;
var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;
    $('#lat').val(crd.latitude);
    $('#longi').val(crd.longitude);

}

function error(err) {
  console.warn(`ERROR(${err.code}): ${err.message}`);
}

$(function(){


navigator.geolocation.getCurrentPosition(success, error, options);

});

 function myPosition(position) {

    latitude=position.coords.latitude;
     longitude=position.coords.longitude;

  }


  </script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAc1zvQXy_AXFbDfyx71itIKKMp9K3Ymyo&sensor=false"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  $('#lat').val(latLng.lat());
   $('#longi').val(latLng.lng());
  document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {


  var latLng = new google.maps.LatLng(12.9481001,77.5427022);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 8,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });

  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);


</script>
@stop