<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    </div>

@if($message=Session::get('success'))
  <div class="alert alert-success ">
    <strong>{{$message}}</strong>
  </div>
  @endif
   <div class="container">

    <div class="text-end">
        <a href="add_product" class="btn btn-info mt-3">Add Product</a>
    </div>
    <h2>Products</h2>
  <table class="table table-hover mt-3">
    <thead>
      <tr>
        <th>Sr No.</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>
            <img src="products/{{$product->image}}" width="50px" height="50px">
        </td>
        <td>
            <a href="edit_product/{{$product->id}}" class="btn btn-success">Edit</a>
            <a href="delete_product/{{$product->id}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
   </div>
</body>
</html>