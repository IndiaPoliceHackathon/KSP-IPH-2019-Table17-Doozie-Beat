@extends('knock.layouts.dashboard')

@section('title', 'My Schedules')

@section('page_title_sub', '')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
     


 <div class="box box-primary">
  <div class="box-body table-responsive no-padding">

    <div class="clearfix"></div>
    <div class="col-md-12">
      <h3 class="box-title">List of My Schedules</h3>


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
          <th>Date</th>
          <th>Beat Route Name</th>
          <th>Planned Visits</th>
          <th>Action</th>
        </tr>

        @foreach($my_schedules as $schedule)
        <tr>
            <td>{{getFormatedDate($schedule->from_date)}} - {{getFormatedDate($schedule->to_date)}}</td>
          <td>{{$schedule->beat_name}}</td>
          <td>{{$schedule->no_of_visits}}</td>
          <td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Add" href="/knock/my_schedule/{{$schedule->id}}" >
            <i class="glyphicon glyphicon-plus"></i>
          </a>
          
          
        </td>
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