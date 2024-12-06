
@extends('admin.layout.structure')
@section('main_code')
<div class="content-wrapper" style="margin-left:250px; ">
    <div class="container">
        <div class="row pad-botm" style="margin-top:80px">
       

        </div>



        <div class="row">

            <div class="col-md-10 col-sm-10 col-xs-10">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        Manage Cart
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Customer ID</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								@if(!empty($cart))   
								@foreach($cart as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->cust_id}}</td>
                                        <td>{{$d->quantity}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>
                                            <a href="delete_cart/<?php echo $d->id?>" class="btn btn-danger">Delete</a>
                                            <a href="" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr> 
								@endforeach
								@endif	 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>
@endsection