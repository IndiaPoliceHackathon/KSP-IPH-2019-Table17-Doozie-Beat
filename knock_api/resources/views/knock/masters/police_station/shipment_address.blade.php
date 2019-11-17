@extends('gst_billing.layouts.dashboard')

  @section('title', 'Shipment Address')

  @section('page_title_sub', 'Shipment Address')

  @section('content')
  <div class='row'>
    <div class='col-md-12'>
      <!-- Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Shipment Address</h3>
          <div class="box-tools pull-right">
            <a href="{{URL::route('gst_billing.masters.supplier.index')}}"><button class="btn btn-danger" ><i class="fa fa-arrow-left"></i> Back</button></a>
          </div>
        </div>

        <div class="box-body table-responsive no-padding">
          <div class="clearfix"></div>

          <div class="pull-right" id="btn_div">

           <a class="btn bg-green margin" id="add_btn" data-toggle="tooltip" data-placement="bottom" title="Click here to add new shipment address">
             <i class="glyphicon glyphicon-pencil"></i> Add
           </a> 

           <a type="button" class="btn bg-navy margin" id="edit_btn" onclick="no_select()" data-toggle="tooltip" data-placement="bottom" title="Select a row from below table and then click edit">
            <i class="glyphicon glyphicon-edit"></i>Edit
          </a>

          <a type="button" class="btn bg-orange margin" id="delete_btn"  onclick="no_select()" data-toggle="tooltip" data-placement="bottom" title="Select a row from below table to delete">
            <i class="glyphicon glyphicon-trash"></i> Delete
          </a>      
        </div>

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

        <div class="clearfix"></div>
        <table class="table table-bordered" id="view">
          <thead>
            <tr class="bg-blue">
              <th></th>
              <th>Company Name</th>
              <th>Country</th>
              <th>State</th>
              <th>City</th>
              <th>Address</th>
              <th>GST Registration Number</th>
             <!--  <th>Created by</th>
              <th>Created on</th>
              <th>Updated by</th>
              <th>Updated on</th> -->
            </tr>
          </thead>
          <tbody id="view_table">

            @foreach($shipment_address as $ac)

            <tr>
              <td><input type="radio" id='{{$ac->id}}' name='ch'></td>
              <td>{{$ac->shipping_company_name}}</td>
              <td>{{$ac->country_name}}</td>
              <td>{{$ac->state_name}}</td> 
              <td>{{$ac->city}}</td>
              <td>{{$ac->address}}</td>
              <td>{{$ac->shipping_gst_reg_number}}</td>
             <!--  <td>{{$ac->cb_name}}</td>
              <td>{{getFormatedDate($ac->created_at)}}</td>
              <td>{{$ac->ub_name}}</td>
              <td>{{getFormatedDate($ac->updated_at)}}</td> -->
            </tr>
            @endforeach

          </tbody>
          <div class="clearfix"></div>

        </table>
        <div class="clearfix"></div>


        <!--MODAL FOR Add Additional Contacts-->
        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" 
        aria-labelledby="myModalLabel" aria-hidden="true" hidden>
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" 
              data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
             Add Shipment Address here
           </h4>

         </div>

         <div class="alert alert-danger alert-dismissable" id="country_select" hidden>
          <i class="fa fa-ban"></i> <b>Error!</b>
          Please select country.
        </div>

        <div class="alert alert-danger alert-dismissable" id="state_select" hidden>
          <i class="fa fa-ban"></i> <b>Error!</b>
          Please select state.
        </div> 

        <!-- Modal Body -->
        <div class="modal-body">
          {!!Form::open(array('route' => array('gst_billing.masters.supplier_shipment_address.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onSubmit'=>'return addValidate()'))!!}
          {!!Form::hidden('supplier_id',$address->id)!!}

          <div class="col-md-6">
            <div class="form-group @if($errors->first('shipping_company_name')) has-error @endif">
             {!!Form::label('shipping_company_name','Company Name *')!!}
             {!!Form::text('shipping_company_name',Input::old('shipping_company_name'),['class' => 'form-control required','id'=>'shipping_company_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter company name","data-placement"=>"bottom",])!!}
             <small class="text-danger">{{ $errors->first('shipping_company_name') }}</small>
           </div>
         </div>


         <div class="col-md-6">
          <div class="form-group @if($errors->first('country_id')) has-error @endif">
           {!!Form::label('country_id','Country*')!!}
           {!! Form::countrySelect('country_id',101) !!}
           <small class="text-danger">{{ $errors->first('country_id') }}</small>
         </div>
       </div>

       <div class='clearfix'></div>

       <div class="col-md-6" id="state_div">
        <div class="form-group @if($errors->first('state_id')) has-error @endif">
         {!!Form::label('state_id','State/Region *')!!}
         {!!Form::select('state_id', array(),null, ['class' => 'form-control required','id'=>'state_id','name'=>'state_id','data-live-search'=>'true','notequl'=>'0']) !!} 
         <small class="text-danger">{{ $errors->first('state_id') }}</small>
       </div>
     </div>   



     <div class="col-md-6">
      <div class="form-group @if($errors->first('city')) has-error @endif">
       {!!Form::label('city','City *')!!}
       {!!Form::text('city',Input::old('city'),['class' => 'form-control required','id'=>'city',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter City","data-placement"=>"bottom",])!!}
       <small class="text-danger">{{ $errors->first('city') }}</small>
     </div>
   </div>
   <div class='clearfix'></div>

   <div class="col-md-6">
    <div class="form-group @if($errors->first('address')) has-error @endif">
     {!!Form::label('address','Address *')!!}
     {!!Form::textarea('address',Input::old('address'),['class' => 'form-control required','id'=>'address',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Address","data-placement"=>"bottom","rows"=>"3"])!!}
     <small class="text-danger">{{ $errors->first('address') }}</small>
   </div>
 </div>

 <div class="col-md-6">
  <div class="form-group @if($errors->first('shipping_gst_reg_number')) has-error @endif">
   {!!Form::label('shipping_gst_reg_number','GST Registration Number *')!!}
   {!!Form::text('shipping_gst_reg_number',Input::old('shipping_gst_reg_number'),['class' => 'form-control required','id'=>'shipping_gst_reg_number',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter gst reg number","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('shipping_gst_reg_number') }}</small>
 </div>
</div>

<div class="clearfix"></div>
</div>

<!-- Modal Footer -->
<div class="modal-footer">
 <div class="col-md-2 pull-right" style="margin-top:50px;">

   <a class="btn btn-block btn-danger btn-block" data-dismiss="modal" >
     Cancel
   </a>
 </div>
 <div class="col-md-2 pull-right" style="margin-top:50px;">
  {!! Form::submit('Save', ['class' => 'btn btn-block btn-success btn-block','id'=>'save_btn']) !!}
</div>
<div class="clearfix"></div>
{!!Form::close()!!}
</div>
</div>
</div>
</div>


<!--MODAL FOR Edit Additional Contacts-->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" 
aria-labelledby="myModalLabel" aria-hidden="true" hidden>
<div class="modal-dialog">
  <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header">
      <button type="button" class="close" 
      data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">
     Edit Shipment Address here
   </h4>
 </div>

 <div class="alert alert-danger alert-dismissable" id="country_select" hidden>
  <i class="fa fa-ban"></i> <b>Error!</b>
  Please select country.
</div>

<div class="alert alert-danger alert-dismissable" id="state_select" hidden>
  <i class="fa fa-ban"></i> <b>Error!</b>
  Please select state.
</div> 

<!-- Modal Body -->
<div class="modal-body">

 {!!Form::model($address,array('route' => array('gst_billing.masters.supplier_shipment_address.update'), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return editValidate()'))!!}
 {!!Form::hidden('supplier_id',$address->id)!!}

 <input type="hidden" name="ac_id" id="ac_id">

 <div class="col-md-6">
  <div class="form-group @if($errors->first('edit_company_name')) has-error @endif">
   {!!Form::label('edit_company_name','Company Name *')!!}
   {!!Form::text('edit_company_name',Input::old('edit_company_name'),['class' => 'form-control required','id'=>'edit_company_name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter company name","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('edit_company_name') }}</small>
 </div>
</div>

<div class="col-md-6">
  <div class="form-group @if($errors->first('sa_country_id')) has-error @endif">
   {!!Form::label('sa_country_id','Country*')!!}
   {!! Form::saCountrySelect('sa_country_id',null) !!}
   <small class="text-danger">{{ $errors->first('sa_country_id') }}</small>
 </div>
</div>
<div class="clearfix"></div>

<div class="col-md-6" id="edit_state_div">
  <div class="form-group @if($errors->first('edit_state_id')) has-error @endif">
   {!!Form::label('edit_state_id','State/Region *')!!}
   {!!Form::select('edit_state_id', array(),null, ['class' => 'form-control required','id'=>'edit_state_id','name'=>'edit_state_id','data-live-search'=>'true','notequl'=>'0']) !!} 
   <small class="text-danger">{{ $errors->first('edit_state_id') }}</small>
 </div>
</div>  

<div class="col-md-6">
  <div class="form-group @if($errors->first('edit_city')) has-error @endif">
   {!!Form::label('edit_city','City *')!!}
   {!!Form::text('edit_city',Input::old('edit_city'),['class' => 'form-control required','id'=>'edit_city',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter City","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('edit_city') }}</small>
 </div>
</div>
<div class="clearfix"></div>

<div class="col-md-6">
 <div class="form-group @if($errors->first('edit_address')) has-error @endif">
   {!!Form::label('edit_address','Address *')!!}
   {!!Form::textarea('edit_address',Input::old('edit_address'),['class' => 'form-control required','id'=>'edit_address',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Address","data-placement"=>"bottom","rows"=>"3"])!!}
   <small class="text-danger">{{ $errors->first('edit_address') }}</small>
 </div>
</div>

<div class="col-md-6">
  <div class="form-group @if($errors->first('edit_gst_reg_no')) has-error @endif">
   {!!Form::label('edit_gst_reg_no','GST Registration Number *')!!}
   {!!Form::text('edit_gst_reg_no',Input::old('edit_gst_reg_no'),['class' => 'form-control required','id'=>'edit_gst_reg_no',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter GST Registration number","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('edit_gst_reg_no') }}</small>
 </div>
</div> 


<div class="clearfix"></div>
</div>

<!-- Modal Footer -->
<div class="modal-footer">
 <div class="col-md-2 pull-right" style="margin-top:50px;">
  <a class="btn btn-block btn-danger btn-block" data-dismiss="modal" >
   Cancel
 </a>
</div>
<div class="col-md-2 pull-right" style="margin-top:50px;">
  {!! Form::submit('Update', ['class' => 'btn btn-block btn-success btn-block',"id"=>"update_btn"]) !!}

</div>

</div>
</div>
</div>
</div>


<div class="clearfix"></div>
{!!Form::close()!!}
</div>
</div>
</div>
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">
  $('#country_id').selectpicker();
  $('#sa_country_id').selectpicker();

  $(function(){
    @if(Session::has('message'))
    $.notify("{{Session::get('message')}}",{
      type:'{{Session::get("er_type")}}',
    });
    @endif

    $('#add_btn').click(function(){
      $('#add-form')[0].reset();
      $('#modal_add').modal('show');


      $('#country_id').change(function(){
        $('#state_id').html('');
        $('#state_div').html('<label>State *</label><select class="form-control" id="state_id" name="state_id" data-live-search="true"></select>');
        var country_id=$('#country_id').val();
        $.ajax({
          type: 'GET',
          url:'{{URL::route("gst_billing.masters.getSpecificStates")}}',
          dataType: 'json',
          data:{country_id:country_id},
          async:false
        }).done(function(result){
          console.log(result);
          result=result['states'];
          var dis='<option value=0>Select State</option>';
          for(i=0;i<result.length;i++){
           dis+='<option value='+result[i]['id']+'>'+result[i]['state_name']+'</option>';
         }
         $('#state_id').html(dis).selectpicker();
       });
      })

      $('#country_id').trigger('change');

    });


    $('.filter').multifilter({'target':$('#view')});
    $('input[name=ch]:radio').attr('checked',false);
    $('input[name=ch]:radio').change(function(){
      var id=$(this).attr('id');
      $("#edit_btn").attr('onclick',"");

      $("#delete_btn").attr('href',"{{URL::to('/')}}/gst_billing/masters/supplier/delete/"+id);
      $("#delete_btn").attr('onclick',"return confirm_delete()");

      $('#edit_btn').click(function(){
        var ac_id=$("input[type='radio'][name='ch']:checked").attr('id');
        console.log(ac_id);

        $.ajax({
          type: 'GET',
          url:'{{URL::route("gst_billing.masters.supplier_shipment_address.SupplierShipmentAddressEdit")}}',
          dataType: 'json',
          data:{ac_id:ac_id},
        }).done(function(result1){
          console.log(result1);
          result=result1['customer_sa'];

          states=result1['states'];

          $('#supplier_id').val(result['supplier_id']);
          $('#edit_company_name').val(result['shipping_company_name']);
          $('#edit_address').val(result['address']);
          $('#edit_city').val(result['city']);       
          $('#ac_id').val(ac_id);
          $('#edit_gst_reg_no').val(result['shipping_gst_reg_number']);
          $('#modal_edit').modal('show');


          var c_dis='<option value="0">Select Option...</option>';
          for(var i=0;i<states.length;i++){
            c_dis+='<option value='+states[i]['id']+'>'+states[i]['state_name']+'</option>';
          }
          $('#edit_state_id').html(c_dis).selectpicker();
          $('#edit_state_id').selectpicker('val',result['state_id']);

          $('#sa_country_id').selectpicker('val',result['country_id']);

          $('#sa_country_id').change(function(){
            $('#edit_state_id').html('');
            $('#edit_state_div').html('<label>State / Region*</label><select class="form-control" id="edit_state_id" name="edit_state_id" data-live-search="true"></select>');

            var country_id=$('#sa_country_id').val();
            $.ajax({
              type: 'GET',
              url:'{{URL::route("gst_billing.masters.getSpecificStates")}}',
              dataType: 'json',
              data:{country_id:country_id},
              async:false
            }).done(function(result){
              console.log(result);
              result=result['states'];
              var dis='<option value=0>Select State</option>';
              for(i=0;i<result.length;i++){
               dis+='<option value='+result[i]['id']+'>'+result[i]['state_name']+'</option>';
             }
             $('#edit_state_id').html(dis).selectpicker();
           });
          });

        });
      });

    });

  });


  function no_select(){
    $.notify("Please select row from below table",{
      type:'danger',
    });
  }

  function confirm_delete(){
    if (!confirm('Do you really want to delete?')) {
      return false;
    }
  }

  function addValidate()
  {
    

    if($('#add-form').valid()){
      if($('#country_id').val()==0){
      $('#country_select').fadeIn(200).delay(5000).fadeOut(1000);
      return false;
    }

    if($('#state_id').val()==0){
      $('#state_select').fadeIn(200).delay(5000).fadeOut(1000);
      return false;
    }
        
      $('#save_btn').attr('disabled',true);
      return true;
    }else{
      return false;
    }
  }

  function editValidate()
  {
    if($('#sa_country_id').val()==0){
     $('#country_select').fadeIn(200).delay(5000).fadeOut(1000);
     return false;
   }

   if($('#edit_state_id').val()==0){
     $('#state_select').fadeIn(200).delay(5000).fadeOut(1000);
     return false;
   }

   if($('#edit-form').valid()){

    $('#update_btn').attr('disabled',true);
    return true;
  }else{
    return false;
  }
}

</script>
@stop
