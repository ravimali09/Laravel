
@extends('website.layout.structure')
@section('main_code')
<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="card" style="width:400px;">
                            <img class="card-img-top"style="height:400px;" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image" style="width:100%">
                       
                            </div>
                        </div>
                    <div class="col-lg-6 text-dark">
         
                <h3>ID: {{$customer->id}}</h3>
                <h3>User Name: {{$customer->cust_name}}</h3>
                <h3>Email: {{$customer->email}}</h3>
                <div class="card-body">
                <a  href="edituser/<?php echo $customer->id;?>" class="btn btn-primary">Edit Profile</a>
            </div>
            
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

  @endsection   

  