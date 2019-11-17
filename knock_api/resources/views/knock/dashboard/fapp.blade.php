@extends('knock.layouts.dashboard')

@section('title','Dashboard')

@section('page_title_sub')

@section('content')
<div class='row'>
  <div class='col-md-12'>      

    <div class="clearfix"></div>
    <div class="col-md-12">

     <div class="col-xs-6">

        <div class="small-box" style="background:gray;color:white;">
          <div class="inner">
             
            <p>
              Welcome {{Auth::user()->police_name}}

              
            </p>
          </div>
          <div class="icon">
            <!-- <i class="fa fa-rupee"></i> -->
          </div>
          <a href="#" class="small-box-footer">
            <br>
          </a>
        </div>
        <!-- <button id="find_btn">Find Me</button> -->
        
        
<div id="map"></div>

        <video id="video" width="200" height="200" autoplay></video>
              <button id="snap" class="btn btn-warning">Capture Photo</button>
              <canvas id="canvas" width="200" height="200"></canvas>
              <div id="result"></div>
              <button class="btn btn-primary" id="proceed"  >Proceed</button>
      </div>
      <div class="col-xs-6" id="capture_details">
        <h4>Visitor Name : {{$schedule->contact_name}}</h4>
        <h4>Visitor Number : {{$schedule->contact_number}}</h4>
      
      {!!Form::open(array('route' => array('my_schedule.store'), 'method' => 'POST','files'=>true,'id'=>'add-form'))!!}
      <input type="hidden" name="lattitude" id="lattitude">
      <input type="hidden" name="longitude" id="longitude">
      <input type="hidden" name="beat_id" id="beat_id" value="{{$schedule->beat_id}}">
      <input type="hidden" name="memeber_id" id="memeber_id" value="{{$schedule->member_id}}">

      @foreach($checklists as $checklist)
      <?php $field_name=$checklist->field_name;  ?>
      <div class="col-md-12">
          <div class="form-group ">
            <label for="{{str_slug($field_name)}}">{{$field_name}}</label>
            <textarea class="form-control email" id="{{str_slug($field_name)}}" data-toggle="popover" data-trigger="focus" title="" data-content="Enter Email" data-placement="bottom" name="{{str_slug($field_name)}}" cols="50" rows="3"></textarea>
            <small class="text-danger"></small>
          </div>
        </div>

      @endforeach
      <div class="col-md-2 pull-right">
          <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-block btn-success btn-block']) !!}
          </div>
        </div>
      {!!Form::close()!!}
  </div>
</div>
</div>
</div>
@endsection

@section('script')
@parent

<script type="text/javascript">
    // Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
  // Not adding `{ audio: true }` since we only want video now
  navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
      //video.src = window.URL.createObjectURL(stream);
      video.srcObject = stream;
      video.play();
  });
} 
else if(navigator.getUserMedia) { // Standard
  navigator.getUserMedia({ video: true }, function(stream) {
      video.src = stream;
      video.play();
  }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
  navigator.webkitGetUserMedia({ video: true }, function(stream){
      video.src = window.webkitURL.createObjectURL(stream);
      video.play();
  }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
  navigator.mozGetUserMedia({ video: true }, function(stream){
      video.srcObject = stream;
      video.play();
  }, errBack);
}


// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
  context.drawImage(video, 0, 0, 200, 200);
  if ("geolocation" in navigator){
          navigator.geolocation.getCurrentPosition(function(position){ 
                  infoWindow = new google.maps.InfoWindow({map: map});
                  var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
                  infoWindow.setPosition(pos);
                  $('#proceed').show();
                  $('#lattitude').val(position.coords.latitude);
                  $('#longitude').val(position.coords.longitude);
        $("#result").html("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                  infoWindow.setContent("Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                  map.panTo(pos);
                   
    
     
              });
      }else{
          console.log("Browser doesn't support geolocation!");
  }
  // $("#find_btn").trigger('click');
});

var map;
function initMap() {
var mapCenter = new google.maps.LatLng(0, 0); //Google map Coordinates
map = new google.maps.Map($("#map")[0], {
      center: mapCenter,
      zoom: 8
    });
}
$('.main-header').hide();
$('#proceed').hide();
$('#capture_details').hide();
$('#proceed').click(function (){
  $('#capture_details').show();
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc1zvQXy_AXFbDfyx71itIKKMp9K3Ymyo&callback=initMap" async defer></script>
@stop