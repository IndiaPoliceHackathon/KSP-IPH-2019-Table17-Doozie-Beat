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

       <a class="btn bg-green margin" href="{{route('police_station.create')}}" data-toggle="tooltip" data-placement="bottom" title="Click here to add">
         <i class="glyphicon glyphicon-pencil"></i> Add 
       </a>

     </div>
      <div class="clearfix" style="margin-top: 15px;"></div>
      <span class="col-md-2 pull-right label label-default" id='no_of_rows'>Number Of Rows :{{count($members)}}</span>
         <div class="clearfix"></div>
     <div id="spinner" class="spinner" hidden>
      <img id="img-spinner" src="{{ asset("/gst_billing/admin-lte/dist/img/loading.gif") }}" alt="Loading"/>
    </div>  
    <table class="table table-bordered" id="view">
      <thead>
        <tr class="bg-blue">
          <th>Contact Name</th>
          <th>Contact Number</th>
          <th>Address</th>
          <th>Photo</th>
          <th width="10%">Lat,Lan</th>
        </tr>

      </thead>
      <tbody id="customer_row">
        @foreach($members as $c)
        <tr>
          <td>{{$c->beat_memeber_type_name}}</td>
          <td>{{$c->contact_name}}</td>
          <td>{{$c->contact_number}}</td>
          <td>{{$c->address}}</td>
          <td><img src="{{$c->photo}}" height="100" width="100"></td>
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