@extends('knock.layouts.dashboard')

@section('title', 'Completed Beats')

@section('page_title_sub', '')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
     


 <div class="box box-primary">
  <div class="box-body table-responsive no-padding">

    <div class="clearfix"></div>
    <div class="col-md-12">
      <h3 class="box-title">List of Completed Beats</h3>


      <div class="pull-right">
 

     </div>
      <div class="clearfix" style="margin-top: 15px;"></div>
      <span class="col-md-2 pull-right label label-default" id='no_of_rows'>Number Of Rows :</span>
         <div class="clearfix"></div>
     <div id="spinner" class="spinner" hidden>
      <img id="img-spinner" src="{{ asset("/gst_billing/admin-lte/dist/img/loading.gif") }}" alt="Loading"/>
    </div>  
    <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
          <!-- <th>Police Station Name</th> -->
          <th>Beat Route Name</th>
          <th>Date</th>
          <th>Planned HostSpot</th>
          <th>Covered HostSpot</th>
          <th>Matching Face</th>
          <th>Matching Number</th>
          <th>Found at Location</th>
        </tr>

        @foreach($my_schedules as $schedule)
        <tr>
          <td>{{$schedule->beat_name}}</td>
          <td>{{$schedule->from_date}} - {{$schedule->to_date}}</td>
          <td>{{$schedule->no_of_visits}}</td>
          <td>{{$schedule->visited_done}}</td>
          <td>{{$schedule->matching_faces}}</td>
          <td>{{$schedule->matching_number}}</td>
          <td>{{$schedule->found_at_location}}</td>
        </tr>
        @endforeach

      </thead>
      <tbody id="customer_row">
        
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