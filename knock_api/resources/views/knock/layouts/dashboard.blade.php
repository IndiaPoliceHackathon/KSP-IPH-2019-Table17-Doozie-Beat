<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> @yield('page_title',env('PROJECT_NAME'))</title>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/knock/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/knock/admin-lte/plugins/colorpicker/bootstrap-colorpicker.min.css") }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/knock/admin-lte/dist/css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/knock/css/jquery-ui.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
      -->
      <link href="{{ asset("/knock/css/dropzone.min.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("/knock/css/tableexport.min.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset("/knock/css/po_preview.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset("/knock/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2-bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css" rel="stylesheet" type="text/css" />
      <link href="{{ asset("/knock/css/daterangepicker/daterangepicker-bs3.css")}}" rel="stylesheet" type="text/css" />

      <link href="{{ asset("/knock/css/bootstrap-select.min.css")}}" rel="stylesheet" type="text/css" />

      <link href="{{ asset("/knock/css/timepicker/bootstrap-timepicker.min.css")}}" rel="stylesheet"/>
      <link href=" {{ asset("/knock/css/datepicker/datepicker.css")}}" rel="stylesheet"/>

      <link href="{{asset("/knock/css/knock.css")}}" rel="stylesheet">
      <link href="{{asset("/knock/css/barcode.css")}}" rel="stylesheet">



      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body class="skin-blue sidebar-collapse" >
    <div class="wrapper">

        <!-- Header -->
        @include('knock.layouts.header')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title',env('PROJECT_NAME'))
                    <small> @yield('page_title_sub','')</small>
                </h1>

            <ol class="breadcrumb">
                @yield('action_buttons')
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->

     @include('knock.layouts.footer')

</div><!-- ./wrapper -->
@section('script')
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/knock/tinymce/js/tinymce/tinymce.min.js") }}"></script>

<script src="{{ asset ("/knock/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset("/knock/js/jquery-ui.min.js") }}" type="text/javascript"></script>

<script src="{{ asset ("/knock/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/knock/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset ("/knock/admin-lte/plugins/colorpicker/bootstrap-colorpicker.min.js") }}"></script>
<script src="{{ asset ("/knock/admin-lte/plugins/fastclick/fastclick.min.js") }}"></script>
<script src="{{ asset ("/knock/admin-lte/plugins/notify/bootstrap-notify.min.js") }}"></script>
<script src="{{ asset ("/knock/js/jquery.validate.js") }}"></script>
<script src="{{ asset ("/knock/js/select2.min.js") }}"></script>
<script src="{{ asset ("/knock/js/dropzone.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/knock/js/xlsx.core.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/knock/js/FileSaver.js") }}" type="text/javascript"></script>
<script src="{{ asset("/knock/js/tableexport.min.js") }}" type="text/javascript"></script>
<script src="{{asset("/knock/admin-lte/plugins/moment.js")}}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/knock/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/knock/js/defaults.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/knock/js/jquery-barcode.js") }}"></script>
<script src="{{ asset ("/knock/js/bootstrap-select.min.js") }}"></script>
<script src="{{ asset ("/knock/js/multifilter.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/knock/js/printThis.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/knock/js/common.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/knock/js/bootbox.min.js") }}"></script>
<script src="{{ asset("/knock/js/daterangepicker.js") }}" type="text/javascript"></script>
<script src="{{ asset("/knock/js/bootstrap-timepicker.min.js") }}" type="text/javascript"></script>

<!-- <script src="https://rawgithub.com/eligrey/FileSaver.js/master/FileSaver.js" type="text/javascript"></script> -->
<script src="{{ asset("/knock/js/bootstrap-timepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/knock/js/bootstrap-datepicker.js") }}" type="text/javascript"></script>
<script type="text/javascript">
$(function(){

     
     

});
var x=1;
@if(count($alarms) > 0)
    setInterval(function(){ 
        if(x==1){
            $("#bell").css('zoom',1.2);
            x=1.1;
        }else{
            $("#bell").css('zoom',1);
            x=1;
        }
    }, 1000);
@endif
  
</script>

<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://dooziesoft.com/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '3']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

<noscript><p><img src="//dooziesoft.com/analytics/piwik.php?idsite=3&rec=1" style="border:0;" alt="" /></p></noscript>
@show

</body>
</html>
