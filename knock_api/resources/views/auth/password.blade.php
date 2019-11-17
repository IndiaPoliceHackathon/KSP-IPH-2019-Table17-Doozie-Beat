@extends('knock.layouts.dashboard')

@section('title', 'Manage Password')

@section('page_title_sub', 'Manage Password')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add New Password Details here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
         {!!Form::open(array('route' => array('updatePassword'), 'method' => 'POST'))!!}

         <div class="col-md-4">
          <div class="form-group @if($errors->first('new_password')) has-error @endif">
            {!! Form::label('new_password', 'New Password') !!}
            {!! Form::input('password','new_password', null, ['class' => 'form-control', 'rows'=>'3',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter a New Password","data-placement"=>"bottom"]) !!}
            <small class="text-danger">{{ $errors->first('new_password') }}</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group @if($errors->first('confirm_password')) has-error @endif">
            {!! Form::label('confirm_password', 'Confirm Password') !!}
            {!! Form::input('password','confirm_password', null, ['class' => 'form-control', 'rows'=>'3',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter a Confirm Password","data-placement"=>"bottom"]) !!}
            <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
          </div>
        </div>
        <div class='clearfix'></div>

        <div class="col-md-2 pull-right">
          <a href="{{URL::previous()}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block']) !!}</a>
        </div>

        <div class="col-md-2 pull-right">
          <div class="form-group">
            {!! Form::submit('Change Password', ['class' => 'btn btn-block btn-success btn-block','id'=>'btn']) !!}
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
