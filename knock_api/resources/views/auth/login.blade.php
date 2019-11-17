
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Knock Knock | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/knock/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" media="all" />
        <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/knock/admin-lte/dist/css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset("/knock/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
      <a href="/" style="color:white;"><b>Knock Knock</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <!-- <form action="" method="post"> -->
          <div class="text-center">
        <img src="{{ asset("/knock/images/hackathon-logo.png") }}" class="img-circle" alt="User Image" />
          </div>
        {!!Form::open(array('route' => array('postLogin'),'method' => 'POST','files'=>true))!!}
         <div class="alert alert-{{Session::get("er_type")}}">{{Session::get('message')}}</div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" id="username" name="username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           <div class="row">
            
            <div class="col-xs-4 pull-right">
              <button type="submit" class="btn btn-primary btn-block btn-flat">LogIn</button>
            </div> 
          </div>
          {!!Form::close()!!}
        <!-- </form> -->

        <!-- <div class="social-auth-links text-center">
        <div class="alert alert-{{Session::get("er_type")}}">{{Session::get('message')}}</div>
          <h4 class="text-center login-box-msg">--- Login with Google Account ---</h4>
          
          <a href="{{URL::to('/')}}/social/login/redirect/google" class="btn btn-block btn-success text-center btn-flat"> Sign In</a>
        </div>  -->

        <!-- <a href="#">I forgot my password</a><br> -->
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/knock/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/knock/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset ("/knock/js/defaults.js") }}" type="text/javascript"></script>
    
    <script src="{{ asset ("/knock/admin-lte/plugins/notify/bootstrap-notify.min.js") }}"></script>
    <!-- iCheck -->
     <script type="text/javascript">
       $(function(){
        // var color=getRandomColor();
        // console.log(color);
        $('body').css('background-color','#415D96');
        localStorage.setItem('menu_text', 'dashboard');
       });
     </script>
  </body>
</html>