<?php
if (session()->has('ses_forget_otp')) {
  
}
else{
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
    <link href="{{url('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{url('admin/assets/css/style-responsive.css')}}" rel="stylesheet">

    
  </head>

  <body>

  
  <div id="login-page ">
	  	<div class="container ">
	  	
		      <form class="form-login" action="{{url('/reset_pass')}}" method="post" enctype="multipart/form-data" style="margin: 170px auto;">
            @csrf
		        <h2 class="form-login-heading ">Enter OTP Below</h2>
		        <div class="login-wrap" >
		            <input type="text" class="form-control"  value="{{old('otp')}}" placeholder="Enter OTP" autofocus name="otp" >
                @error('otp')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
		            <br>    
		            <button class="btn btn-theme btn-block" href="" type="submit"><i class="fa fa-lock"></i> Submit</button>
		            <hr>
		            
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

