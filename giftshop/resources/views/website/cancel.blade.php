@extends('website.layout.structure')
@section('main_code')





<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <div class="alert alert-danger text-danger">
            <strong>Sorry!</strong> Your payment has been Cancelled..!
        </div>
    </div>
    <div class="container">
        <a href="/shop" class="btn btn-primary my-5 ">Back to Shopping</a>
    </div>
</body>

</html>



@endsection