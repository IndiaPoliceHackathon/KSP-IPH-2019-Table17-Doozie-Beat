@extends('knock.layouts.dashboard')

@section('title', 'Beat')

@section('page_title_sub', 'Beat Master')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
     


 <div class="box box-primary">
  <div class="box-body table-responsive no-padding">

    <div class="clearfix"></div>
    <div class="col-md-12">
      <h3 class="box-title">List of Beats</h3>


      <div class="pull-right">

       <a class="btn bg-green margin" href="{{route('beat.create')}}" data-toggle="tooltip" data-placement="bottom" title="Click here to add">
         <i class="glyphicon glyphicon-pencil"></i> Add 
       </a>

     </div>
      <div class="clearfix" style="margin-top: 15px;"></div>
      <span class="col-md-2 pull-right label label-default" id='no_of_rows'>Number Of Rows :{{count($beats)}}</span>
         <div class="clearfix"></div>
     <div id="spinner" class="spinner" hidden>
      <img id="img-spinner" src="{{ asset("/gst_billing/admin-lte/dist/img/loading.gif") }}" alt="Loading"/>
    </div>  
    <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
          <th>Police Station Name</th>
          <th>Beat Name</th>
          <th>Minimum Hotspots</th>
          <th>Added Hotspots</th>
          <th width="10%">Action</th>
        </tr>

      </thead>
      <tbody id="customer_row">
        @foreach($beats as $c)
        <tr>
          <td>{{$c->police_station_name}}</td>
          <td>{{$c->beat_name}}</td>
          <td>{{$c->minimum_hostspots}}</td>
          <td>{{$c->count}}</td>
          <td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Add Beat Member " href="/knock/masters/beat/{{$c->id}}" >
            <i class="glyphicon glyphicon-plus"></i>
          </a>
          <a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="View Beat Member " href="/knock/masters/beat/{{$c->id}}/edit" >
            <i class="glyphicon glyphicon-eye-open"></i>
          </a>
        </td>
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