@extends('gst_billing.layouts.dashboard')

@section('title', 'Supplier')

@section('page_title_sub', 'Manage Supplier')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Supplier here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::model($customer,array('route' => array('gst_billing.masters.supplier.update', $customer->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onsubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$customer->id)!!}

          <input type="hidden" name="sales_manager_id" id="sales_manager_id">
          <input type="hidden" id="shippment_id" name="shippment_id">

          @include('gst_billing.masters.supplier._form')
         
         <div class="clearfix"></div>

         <div class="col-md-2 pull-right">
          <a href="{{URL::route('gst_billing.masters.supplier.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
        </div>

        <div class="col-md-2 pull-right">
          <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-block btn-success btn-block']) !!}
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
  var customer=<?php echo json_encode($customer) ?>;
  var states=<?php echo json_encode($states) ?>;

  $('#customer_type option[value='+customer['customer_type']+']').attr('selected','selected');

  $('#country_id').selectpicker();
  $('#sa_country_id').selectpicker();

  $('#shippment_id').val(customer['shipping_id'])
  $('#sa_city').val(customer['sa_city']);
  $('#sa_address').val(customer['sa_address']);

  $(function(){
    @if(Session::has('message'))
    $.notify("{{Session::get('message')}}",{
      type:'{{Session::get("er_type")}}',
    });
    @endif

    $('#industry_id').selectpicker('val',customer['industry']);


    var c_dis='<option value="0">Select Option...</option>';
    for(var i=0;i<states.length;i++){
      c_dis+='<option value='+states[i]['id']+'>'+states[i]['state_name']+'</option>';
    }
    $('#state_id').html(c_dis).selectpicker();
    $('#state_id').selectpicker('val',customer['state_region']);

    $('#country_id').selectpicker('val',customer['country_id']);



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
    });

    $('#sa_country_id').change(function(){
      $('#sa_state_id').html('');
      $('#sa_state_div').html('<label>State / Region *</label><select class="form-control" id="sa_state_id" name="sa_state_id" data-live-search="true"></select>');

      var country_id=$('#sa_country_id').val();
      $.ajax({
        type: 'GET',
        url:'{{URL::route("gst_billing.masters.getSpecificStates")}}',
        dataType: 'json',
        data:{country_id:country_id},
        async:false
      }).done(function(result1){
        console.log(result1);
        result=result1['states'];
        var sa_dis='<option value=0>Select State</option>';
        for(i=0;i<result.length;i++){
         sa_dis+='<option value='+result[i]['id']+'>'+result[i]['state_name']+'</option>';
       }
       $('#sa_state_id').html(sa_dis).selectpicker();

     });
    });

    $('#sa_country_id').selectpicker('val',customer['sa_country_id']);
    $('#sa_country_id').trigger('change');
    console.log(customer['sa_state_id']); 
    if(customer['sa_state_id']>0){
     $('#sa_state_id').selectpicker('val', customer['sa_state_id']);
   }
 });

  function validate()
  {
    if($('#edit-form').valid()){

      var sales=$("input[type='radio'][name='ch']:checked").attr('id');
      $('#sales_manager_id').val(sales);

      if(Number($('#industry_id').val())==0)
      {
        $.notify({message: 'Please select industry.'},{ type: 'danger'});
        return false;
      }

      if(Number($('#country_id').val())==0)
      {
        $.notify({message: 'Please select country.'},{ type: 'danger'});
        return false;
      }

      if(Number($('#state_id').val())==0)
      {
        $.notify({message: 'Please select state.'},{ type: 'danger'});
        return false;
      }
      
      return true;
    }else{
      return false;
    }
  }


  function checkBillingAddress()
  {
    var city=$('#city').val();
    var address=$('#address').val();
    var country_id=$('#country_id').val();
    var state_id=$('#state_id').val();

    if($('#' + 'ch1').is(":checked"))
    {
      if(city!="" && address!="" && Number(country_id)!=0 && Number(state_id)!=0){

        $('#sa_city').val(city);
        $('#sa_address').val(address);

        $('#sa_country_id').selectpicker('val',country_id);
        $('#sa_country_id').trigger('change');
        $('#sa_state_id').selectpicker('val',state_id);

      }else{
        $.notify({message: 'Please enter Billing Address.'},{ type: 'danger'});
        $("#ch1").attr("checked", false);
        return false;
      }

    }else{
      $('#sa_city').val('');
      $('#sa_address').val('');
      $('#sa_state_id').selectpicker('deselectAll');
    }
  }

</script>
@stop
