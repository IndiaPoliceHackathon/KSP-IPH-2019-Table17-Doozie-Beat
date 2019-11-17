@extends('knock.layouts.dashboard')

@section('page_title','HRMS')

@section('page_title_sub', 'Masters > Designation')


@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Designation here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($designation,array('route' => array('knock.masters.designation.update', $designation->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form'))!!}
          {!!Form::hidden('id',$designation->id)!!}


          @include('knock.masters.designation._form',['submitButtonText'=>'Update'])
          
          <div class="clearfix"></div>
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
$(function(){
  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif

});
</script>
@stop
