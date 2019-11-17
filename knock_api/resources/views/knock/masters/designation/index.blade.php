@extends('knock.layouts.dashboard')

@section('page_title','Knock')

@section('page_title_sub', 'Masters > Designation')

@section('content')
<div class='row'>

  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">List of Designations</h3>
      </div>

      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="pull-right">

            <button class="btn bg-green margin" id="add_btn" data-toggle="tooltip" data-placement="bottom" title="Click here to add New Designation">
             <i class="glyphicon glyphicon-pencil"></i> Add Designation
           </button>

           
         </div><div class="clearfix" style="margin-top: 15px;"></div>
        <span class="col-md-2 pull-right label label-default" id='no_of_rows'>Number Of Rows :{{count($designation)}}</span>
        <div class="clearfix"></div>
         
         <div class="clearfix"></div>
         {!!Form::open(array('route' => array('designation.store'), 'method' => 'POST','files'=>true,'id'=>'add-form'))!!}

         <table class="table table-bordered" id="view">
          <thead>
            <tr class="bg-blue">
              
              <th>Designation Name</th>
              <th>Description</th>
              <th>Reporting To</th>
              <th>Actions</th>
            </tr>


            <tr tr class="bg-blue">
              
              <th><input type="text" class="form-control filter" data-col="Designation Name" name="filter_type"></th>
              <th><input type="text" class="form-control filter" data-col="Description" name="filter_type"></th>
              

              <th></th>
              <th></th>
            </tr>

          </thead>
          <tbody id="row">
            @foreach($designation as $dt)
            <tr id="designation_tr{{$dt->id}}"  style="page-break-inside: avoid;" tabindex="-1" data-toggle="popover" data-placement="top" data-trigger="focus"  >
              
              <td>{{$dt->name}}</td>   
              <td>{{$dt->description}}</td>
              <td>{{$dt->reporting_name}}</td>

              
              <td>
                <a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Edit " onclick="editDesignation('{{$dt->id}}')">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>

                

                <a href="{{URL::to('/')}}/knock/masters/designation/deactivate/{{$dt->id}}" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="Activate/Deactivate" onclick="return confirmDelete('{{$dt->deleted_at}}')">
                  <i class="fa fa-lock text-red" style='font-size:18px;'></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <div class="clearfix"></div>

        </table>
        {!!Form::close()!!}
        <div class="clearfix"></div>
        
      </div>
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
</div>
@endsection
@section('script')
@parent

<script type="text/javascript">
 $('.filter').multifilter({'target':$('#view')});
 var specific_designation=0;
 var edit_flag=0;

 var designation=<?php echo json_encode($designation) ?>;
 console.log(designation);

 $('.filter').on('change',function(){
    var rows=($('tr:visible').length - 2);
    $('#no_of_rows').html("Number of Rows : "+rows);
  });
 
 $(function(){

  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif

  $('#add_btn').click(function(){
    if(edit_flag === 1){
      cancelEdit();
    }
    $(this).attr('disabled',true);
    $(this).tooltip('hide');
    var dis='';
    dis+='<tr>';
    dis+='<td><input type="text" class="form-control required" id="name" name="name"></td>';
    dis+='<td><textarea class="form-control" id="description" name="description"></textarea></td>';
    dis+='<td></td>';  
    dis+='<td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Save" onclick=saveDesigantion()><i class="fa fa-floppy-o"></i></a><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Cancel" onclick=cancelAdd()><i class="glyphicon glyphicon-remove text-red"></i></a></td>';
    dis+='</tr>';

    $('#row').prepend(dis);

    


  });

});

 function cancelAdd(){
  $('#row tr:first').remove();
  $('#add_btn').attr('disabled',false);
}

function saveDesigantion()
{


  if($('#add-form').valid()){

    var formData = new FormData($('#add-form')[0]);

    var ajax = $.ajax({
      type: 'post',
      url:'{{URL::route("designation.store")}}',
      data: formData,
      contentType: false,
      processData: false
    }).done(function(result) {
      console.log(result);

      if(result==1){
       $.notify("This Designation already been taken",{
        type:'danger',
      });

       return false;
     }else{
      window.location.reload();

      $.notify("Designation Saved Successfully!",{
        type:'success',
      });
    }
  });
  }
  
}


function editDesignation(id)
{
  if(edit_flag == 1){
    cancelEdit();
  }
  specific_designation=0;

  for(var v=0;v<designation.length;v++)
  {
    if(id == designation[v]['id'])
    {
      specific_designation=designation[v];
      break;
    }
  }

  if(specific_designation['deleted_at']==null){
    edit_flag=1;
    if($('#add_btn').attr('disabled') == 'disabled'){
      cancelAdd();
    } 
    var dis='';
    dis+='<td><input type="text" class="form-control required" id="name" name="name"></td>';
    dis+='<td><textarea class="form-control" id="description" name="description"></textarea></td>';
    dis+='<td></td>';
    dis+='<td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Update" onclick=updateDesignation('+id+')><i class="fa fa-floppy-o"></i></a><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Cancel" onclick=cancelEdit()><i class="glyphicon glyphicon-remove text-red"></i></a></td>';

    $('#designation_tr'+id).html(dis);    

    
    $('#name').val(specific_designation['name']);
    $('#description').val(specific_designation['description']);

  }else{
    $.notify({message: 'Cannot edit Deactivated Designation.'},{ type: 'danger'});      
    return false;
  }
}


function updateDesignation(id)
{

  if($('#add-form').valid()){

    var formData = new FormData($('#add-form')[0]);

    formData.append('id',id);
    var ajax = $.ajax({
      type: 'post',
      url:'{{URL::route("designation.updateDesignation")}}',
      data: formData,
      contentType: false,
      processData: false
    }).done(function(result) {
      console.log(result);
      if(result==1){

       $.notify("Designation already exists",{
        type:'danger',
      });
       return false;
     }else{
      window.location.reload();
      $.notify("Designation Updated Successfully!",{
        type:'success',
      });
    }
  });
  }
  
}

function cancelEdit()
{
  var new_dis='';

  new_dis+='<td>'+specific_designation['name']+'</td>';
  new_dis+='<td>'+specific_designation['description']+'</td>';

  if(specific_designation['deleted_at']==null){
    new_dis+='<td><i class="fa fa-check text-green"></i></td>';
  }else{
    new_dis+='<td><i class="fa fa-times-circle-o text-red"></i></td>';
  }
  
  new_dis+='<td><a class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Edit DepositType" onclick="editDesignation('+specific_designation['id']+')"><i class="glyphicon glyphicon-edit"></i></a><a href="{{URL::to('/')}}/knock/masters/designation/deactivate/'+specific_designation['id']+'" class="td-action-btn" data-toggle="tooltip" data-placement="top" title="Activate/Deactivate" onclick="return confirmDelete('+specific_designation['deleted_at']+')">  <i class= "fa fa-lock text-red"></i></a></td>';
  $('#designation_tr'+specific_designation['id']).html(new_dis);
}


function confirmDelete(status)
{
  if(status){
    if (!confirm('Do you really want to Activate...?')) {
      return false;
    }
  }else{
    if (!confirm('Do you really want to Deactivate...?')) {
      return false;
    }
  }
}

</script>
@stop