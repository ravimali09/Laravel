@extends('website.layout.structure')
@section('main_code')

@if(request()->has(['item_name', 'tx', 'amt', 'cc', 'st', 'payer_id', 'payer_email', 'first_name', 'last_name']))
    @php
        session([
            'item_name' => request('item_name'),
            'transaction_id' => request('tx'),
            'amount' => request('amt'),
            'currency' => request('cc'),
            'status' => request('st'),
            'payer_id' => request('payer_id'),
            'payer_email' => request('payer_email'),
            'payer_name' => request('first_name') . ' ' . request('last_name'),
        ]);
    @endphp
@endif

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

        <div class="alert alert-success">
            <strong>Success!</strong> Payment has been received!
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Transaction ID</td>
                    <td>{{ session('transaction_id') }}</td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td>{{ session('item_name') }}</td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>{{ session('amount') }}</td>
                </tr>
                <tr>
                    <td>Payment Status</td>
                    <td>{{ session('status') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>

@endsection
