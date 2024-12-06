<?php
if (session()->has('ses_userid')) {
  echo "<script>window.location='/index';</script>";
}
?>

<?php
 @include('sweetalert::alert')
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('admin/assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{url('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{url('admin/assets/css/style-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  
  <div id="login-page ">
	  	<div class="container ">
	  	
		      <form class="form-login" action="{{url('/forget_otp')}}" method="post" enctype="multipart/form-data" style="margin: 170px auto;">
            @csrf
		        <h2 class="form-login-heading ">Enter Registered Email</h2>
		        <div class="login-wrap" >
		            <input type="text" class="form-control"  value="{{old('email')}}" placeholder="Email" autofocus name="email" >
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
		            <br>    
		            <button class="btn btn-theme btn-block" href="" type="submit"><i class="fa fa-lock"></i> Send OTP</button>
		            <hr>
		            
		            <div class="registration">
		                Remember PAssword?<br/>
		                <a class="btn btn-info" href="user_login">Login</a>
		            </div>
		
		        </div>
		      </form>	  		  	
	  	</div>
	  </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{url('admin/assets/js/jquery.js')}}"></script>
    <script src="{{url('admin/assets/js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{url('admin/assets/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{url('admin/assets/img/login-bg.avif')}}	", {speed: 500});
    </script>


  </body>
</html>

