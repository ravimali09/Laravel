@extends('admin.layout.structure')
@section('main_code')

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Add Product</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                    @error('name')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input type="text" name="description" value="{{old('description')}}" class="form-control">
                                    @error('description')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                  <input type="file" name="image" value="{{old('image')}}" class="form-control">
                                    @error('image')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Price</label>
                              <div class="col-sm-10">
                                  <input type="text" name="price" value="{{old('price')}}" class="form-control">
                                    @error('price')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10">
                              <button type="submit" class="btn btn-theme col-sm-3">Add Product</button>
                              </div>
                          </div>
                          
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
        
          	
      @endsection