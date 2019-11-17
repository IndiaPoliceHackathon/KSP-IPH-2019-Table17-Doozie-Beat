@extends('knock.layouts.dashboard')

@section('title', 'Beat Schedule')

@section('page_title_sub', 'Beat Schedule Details')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
     


 <div class="box box-primary">
  <div class="box-body table-responsive no-padding">

    <div class="clearfix"></div>
    <div class="col-md-12">
      <h3 class="box-title">List of Beat Schedules</h3>


      <div class="pull-right">

       <a class="btn bg-green margin" href="{{route('schedule_beat.create')}}" data-toggle="tooltip" data-placement="bottom" title="Click here to add">
         <i class="glyphicon glyphicon-pencil"></i> Add 
       </a>

     </div>
      <div class="clearfix" style="margin-top: 15px;"></div>
      <span class="col-md-2 pull-right label label-default" id='no_of_rows'>Number Of Rows :{{count($beat_schedules)}}</span>
         <div class="clearfix"></div>
     <div id="spinner" class="spinner" hidden>
      <img id="img-spinner" src="{{ asset("/gst_billing/admin-lte/dist/img/loading.gif") }}" alt="Loading"/>
    </div>  
    <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
          <th>Police Station Name</th>
          <th>Collar Number</th>
          <th>Designation</th>
          <th>Police Name</th>
          <th>Contact Person</th>
          <th>Contact Number</th>
          <th>From Date</th>
          <th>To Date</th>
          <th>Frequency</th>
          <th>No of Visits</th>
          <th width="10%">Action</th>
        </tr>

      </thead>
      <tbody id="customer_row">
        @foreach($beat_schedules as $c)
        <tr>
          <td>{{$c->police_station_name}}</td>
         
          <td>{{$c->collar_no}}</td>
          <td>{{$c->name}}</td>
          <td>{{$c->police_name}}</td>
          <td>{{$c->contact_name}}</td>
          <td>{{$c->contact_number}}</td>
          <td>{{getFormatedDate($c->from_date)}}</td>
          <td>{{getFormatedDate($c->to_date)}}</td>
          <td>{{$c->frequency}}</td>
          <td>{{$c->no_of_visits}}</td>
      </tr>
      @endforeach
    </tbody>
    <div class="clearfix"></div>

  </table>


  <div class="clearfix"></div>
</div>
</div>
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">

     
</script>
@stop