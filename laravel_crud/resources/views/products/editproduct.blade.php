<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


  @if($message=Session::get('success'))
  <div class="alert alert-success ">
    <strong>{{$message}}</strong>
  </div>
  @endif

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-5">
        <div class="card mt-5 p-5 bg-info">
          <h3 class="text-muted">Edit Product : {{$product->name}}</h3>
          <form action="/update_product/{{$product->id}}" class="mt-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control" placeholder="Enter Product Name">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text" name="description" class="form-control" placeholder="Enter Product Description" value="{{old('name',$product->description)}}" ></input>
              @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" value="{{old('image')}}" class="form-control">
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-3 align-item-center">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center container mt-5">
        <a class="btn btn-dark" href="/">Back</a>
      </div>
    </div>
  </div>
</body>
</html>