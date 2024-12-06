<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Signup</title>

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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page ">
	  	<div class="container ">
	  	
		      <form class="form-login" action="" method="post" enctype="multipart/form-data">
            @csrf
		        <h2 class="form-login-heading ">Signup now</h2>
		        <div class="login-wrap" >
                <input type="text" class="form-control"  value="{{old('cust_name')}}" placeholder="Name" autofocus name="cust_name">
                @error('cust_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <input type="email" class="form-control"  value="{{old('email')}}" placeholder="Email" autofocus name="email">
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
		            <br>
		            <input type="password" class="form-control"  value="{{old('password')}}" placeholder="Password" name="password">
                @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="forger_password"> Forgot Password?</a>
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="" type="submit"><i class="fa fa-lock"></i> SIGNUP</button>
		            <hr>
		            
		            <div class="registration">
		                Already have an account?<br/>
		                <a class="" href="user_login">Login</a>
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

