@extends('knock.layouts.dashboard')

@section('title', 'Police Station')

@section('page_title_sub', 'Police Station Master')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
     


 <div class="box box-primary">
  <div class="box-body table-responsive no-padding">

    <div class="clearfix"></div>
    <div class="col-md-12">
      <h3 class="box-title">List of Police Station</h3>


      <div class="pull-right">

       <a class="btn bg-green margin" href="{{route('police_station.create')}}" data-toggle="tooltip" data-placement="bottom" title="Click here to add">
         <i class="glyphicon glyphicon-pencil"></i> Add 
       </a>

     </div>
      <div class="clearfix" style="margin-top: 15px;"></div>
      <span class="col-md-2 pull-right label label-default" id='no_of_rows'>Number Of Rows :{{count($police_stations)}}</span>
         <div class="clearfix"></div>
     <div id="spinner" class="spinner" hidden>
      <img id="img-spinner" src="{{ asset("/gst_billing/admin-lte/dist/img/loading.gif") }}" alt="Loading"/>
    </div>  
    <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
          <th>Police Station Name</th>
          <th>Address</th>
          <th>No of Polices</th>
          <th>No of Beat Routes</th>
          <th>Phone No</th>
         
          <th width="10%">Action</th>
        </tr>

      </thead>
      <tbody id="customer_row">
        @foreach($police_stations as $c)
        <tr>
          <td>{{$c->police_station_name}}</td>
          <td>{{$c->address}}</td>
          <td>{{$c->no_of_polices}}</td>
          <td>{{$c->no_of_beat_routes}}</td>
          <td>{{$c->phone_no}}</td>
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