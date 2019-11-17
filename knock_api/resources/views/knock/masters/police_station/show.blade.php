@extends('gst_billing.layouts.dashboard')

@section('title', 'Supplier')

@section('page_title_sub', 'Manage Supplier')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View Supplier Details here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($customer,array('route' => array('gst_billing.masters.customer.update', $customer->id), 'method' => 'PUT','files'=>true,'id'=>'view-form'))!!}

          <div class="col-md-4">
            <div class="form-group @if($errors->first('supplier_name')) has-error @endif">
             {!!Form::label('supplier_name','Supplier Name *')!!}
             {!!Form::text('supplier_name',Input::old('supplier_name'),['class' => 'form-control required','id'=>'supplier_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Customer Name","data-placement"=>"bottom","disabled"])!!}
             <small class="text-danger">{{ $errors->first('supplier_name') }}</small>
           </div>
         </div>

         <div class="col-md-4">
          <div class="form-group @if($errors->first('office_email_id')) has-error @endif">
            {!! Form::label('office_email_id', 'Email ID') !!}
            {!! Form::text('office_email_id', Input::old('office_email_id'), ['class' => 'form-control required email','id'=>'office_email_id', "data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter email","data-placement"=>"bottom",'disabled']) !!}
            <small class="text-danger">{{ $errors->first('office_email_id') }}</small>
          </div>
        </div>

        
     <div class="col-md-4">
      <div class="form-group @if($errors->first('phone_number')) has-error @endif">
       {!!Form::label('phone_number','Phone Number ')!!}
       {!!Form::input('number','phone_number',Input::old('phone_number'),['class' => 'form-control required','id'=>'phone_number',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Phone Number","data-placement"=>"bottom","disabled"])!!}
       <small class="text-danger">{{ $errors->first('phone_number') }}</small>
     </div>
   </div>

   <div class="col-md-4">
    <div class="form-group @if($errors->first('country_id')) has-error @endif">
     {!!Form::label('country_id','Country *')!!}
     {!!Form::text('country_id',$customer->country_name,['class' => 'form-control required','id'=>'country_id',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter State/Region","data-placement"=>"bottom","disabled"])!!}
     <small class="text-danger">{{ $errors->first('country_id') }}</small>
   </div>
 </div>
 

 <div class="col-md-4">
  <div class="form-group @if($errors->first('state_region')) has-error @endif">
   {!!Form::label('state_region','State/Region *')!!}
   {!!Form::text('state_region',$customer->state_name,['class' => 'form-control required','id'=>'state_region',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter State/Region","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('state_region') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div class="form-group @if($errors->first('City')) has-error @endif">
   {!!Form::label('city','City *')!!}
   {!!Form::text('city',Input::old('city'),['class' => 'form-control required','id'=>'city',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter City","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('city') }}</small>
 </div>
</div>

<div class="col-md-4">
  <div>
    {!! Form::label('address', 'Address *') !!}
    {!! Form::textarea('address', Input::old('address'), ['class' => 'form-control required', "data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter address","data-placement"=>"bottom",'rows'=>'2',"disabled"]) !!}
  </div>
</div>



<div class="col-md-4">
  <div class="form-group @if($errors->first('registration_number')) has-error @endif">
   {!!Form::label('registration_number','Registration Number *')!!}
   {!!Form::text('registration_number',Input::old('registration_number'),['class' => 'form-control required','id'=>'registration_number',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Postal Code","data-placement"=>"bottom","disabled"])!!}
   <small class="text-danger">{{ $errors->first('registration_number') }}</small>
 </div>
</div>




<div class="col-md-4">
  <div class="form-group @if($errors->first('payment_terms')) has-error @endif">
   {!!Form::label('payment_terms','Payment Terms')!!}
   {!!Form::text('payment_terms',Input::old('payment_terms'),['class' => 'form-control','id'=>'payment_terms','disabled'])!!}
   <small class="text-danger">{{ $errors->first('payment_terms') }}</small>
 </div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
  <div class="form-group @if($errors->first('credit_days')) has-error @endif">
   {!!Form::label('credit_days','Credit Days')!!}
   {!!Form::text('credit_days',Input::old('credit_days'),['class' => 'form-control','id'=>'credit_days','disabled'])!!}
   <small class="text-danger">{{ $errors->first('credit_days') }}</small>
 </div>
</div>


<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Description')!!}
   {!!Form::textarea('description',Input::old('description'),['class' => 'form-control','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Description","data-placement"=>"bottom",'rows'=>'2',"disabled"])!!}
   <small class="text-danger">{{ $errors->first('description') }}</small>
 </div>
</div>

<div class="col-md-3" style="margin-top: 30px;">
  <div class="form-group @if($errors->first('urd')) has-error @endif">
   {!!Form::checkbox('urd',null)!!}
   {!!Form::label('urd','URD')!!}
   <small class="text-danger">{{ $errors->first('urd') }}</small>
 </div>
</div>

<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('gst_billing.masters.supplier.index')}}">{!! Form::button('Close', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>

<div class="clearfix"></div><br>
{!!Form::close()!!}
</div>
</div><!-- /.box -->
</div><!-- /.col -->
</div>
</div><!-- /.row -->
@endsection
