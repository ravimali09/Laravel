<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin Login</title>

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

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="{{url('/admin_auth')}}" method="post">
				@csrf
		        <h2 class="form-login-heading">Admin Login </h2>
		        <div class="login-wrap">    
					<input type="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email" name="email" id="email">
					@error('email')
                	  <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
		            <br/>
		            <input type="password" class="form-control" value="{{old('password')}}" placeholder="Password"  name="password">
					@error('password')
               		   <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
		            <hr>
		        </div>
		
		          <!-- Modal -->
		          <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div> -->
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>
<!-- 
	  <form method="POST" action="{{ url('/admin_auth') }}">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <button type="submit">Login</button>
</form> -->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{url('admin/assets/js/jquery.js')}}"></script>
    <script src="{{url('admin/assets/js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{url('admin/assets/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{url('admin/assets/img/dashboard-bg.avif')}}	", {speed: 500});
    </script>


  </body>
</html>

