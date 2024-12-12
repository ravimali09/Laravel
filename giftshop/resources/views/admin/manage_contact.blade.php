@extends('admin.layout.structure')
@section('main_code')
<div class="content-wrapper mt-4">
    <div class="container ">
        <div class="row ">
            <div class="col-md-2 col-sm-3 col-xs-4">
            </div>

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9 col-xs-8 ">
                <div class="panel panel-success" style="margin-top: 90px;">
                    <div class="panel-heading text-center">
                        Manage Contact
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Customer ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($contact))   
								@foreach($contact as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->cust_id}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->comment}}</td>
                                        <td>
                                            <a href="delete_contact/<?php echo $d->id?>" class="btn btn-danger">Delete</a>
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
