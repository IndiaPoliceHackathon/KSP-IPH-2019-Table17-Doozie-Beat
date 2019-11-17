<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

     

    

<!-- Sidebar Menu -->
<ul class="sidebar-menu" style="padding-top:5px;">
 
<!-- Optionally, you can add icons to the links -->
<div  id="nav_sub_menu_container" style="padding-left:25px;padding-top:5px;"></div>




</ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
@section('script')
@parent
<script type="text/javascript">
function resetActiveMenu(){
$.ajax({
        type: 'GET',
        url:'{{URL::route("knock.user_management.getSpecificSubMenus")}}',
        dataType: 'json',
        data:{menu:'dashboard'},
        async:false
    }).done(function(result){
        console.log(result);
        result=result['sub_menus'];
        var dis='';
        for(i=0;i<result.length;i++){
            
            dis+='<li class="active" style="padding-top:20px;"><i class="fa fa-angle-double-right" style="color:white;"></i> <a href="/knock'+result[i]['address']+'">'+result[i]['menu_text']+'</a></li>';
       
        }
      
        $('#nav_sub_menu_container').html(dis);
    });
}
</script>
@stop