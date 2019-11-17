
<div class="col-md-4">
  <div class="form-group @if($errors->first('name')) has-error @endif">
   {!!Form::label('name','Designation name*')!!}
   {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('name') }}</small>
 </div>
</div>






<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Description')!!}
   {!!Form::text('description',Input::old('description'),['class' => 'form-control required','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Description","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('description') }}</small>
 </div>
</div>






<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('knock.masters.designation.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-block btn-success btn-block']) !!}
  </div>
</div>


@section('script')
@parent
<script type="text/javascript">
  $(function(){
   
  });
</script>

@stop
