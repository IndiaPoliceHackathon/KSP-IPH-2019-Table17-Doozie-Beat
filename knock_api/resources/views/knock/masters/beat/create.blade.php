@extends('knock.layouts.dashboard')

@section('title', 'Beat')

@section('page_title_sub', 'Add Beat')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Beat here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::open(array('route' => array('beat.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onsubmit'=>'return validate()'))!!}
          
          @include('knock.masters.beat._form')

          <div class='clearfix'></div>

          <div class="col-md-2 pull-right">
            <a href="{{URL::route('beat.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
          </div>

          <div class="col-md-2 pull-right">
            <div class="form-group">
              {!! Form::submit('Save', ['class' => 'btn btn-block btn-success btn-block']) !!}
            </div>
          </div>

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
   

</script>
@stop
