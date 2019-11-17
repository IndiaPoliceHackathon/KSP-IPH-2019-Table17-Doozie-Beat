<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title> @yield('page_title',env('PROJECT_NAME'))</title>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/knock/admin-lte/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" media="all" />
     
    <!-- Theme style -->
    <link href="{{ asset("/knock/admin-lte/dist/css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/knock/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
  <!-- <style> @font-face { font-family: "Arial Unicode"; src: url(/knock/ARIALUNI.TTF); unicode-range: U+0-10FFFF; } * { font-family: "Arial Unicode"; } </style> -->
  <style> @font-face { font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; </style>
<style>
  tr, td, th, tbody, thead, tfoot {
    page-break-inside: avoid !important;
    color:#000 !important;
    border-color: black !important;

}
table, tr, td, tbody, thead, tfoot {
    font-weight:normal;
     border-color: black !important;
}

  </style>
  <style type="text/css">
 table {
   border-width: 0.5px !important;
 }

 .table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
 border-width: 0.5px !important;
}





</style>
</head>
<body >
<div style="margin-top: -170px;">
            @yield('content')
</div> 
</body>
</html>