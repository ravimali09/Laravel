
@extends('website.layout.structure')
@section('main_code')

<div id="login-page ">
	  	<div class="container ">
	  	
		      <form class="form-login" action="{{url('/update/'.$customer->id)}}" method="post">
            @csrf
		        <h2 class="form-login-heading text-center my-4">Edit Your Profile</h2>
		        <div class="login-wrap" >
                <input type="text" class="form-control" value="{{$customer->cust_name}}"  placeholder="Name" autofocus name="cust_name">
                <br>
                <input type="email" class="form-control" value="{{$customer->email}}" placeholder="Email" autofocus name="email">
		            <br>
		           
		            <button class="btn btn-primary"  style="margin-left:500px; margin-top:20px" name="submit" type="submit">Update</button>
		            <hr>
		                <a class="btn btn-primary my-4" href="/profile">Go Back</a>
		            </div>
		
		        </div>
		      </form>	  		  	
	  	</div>
	  </div>
@endsection   

  