@extends('website.layout.structure')
@section('main_code')


<!-- Shop Section -->
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>

        <div class="row">
            @if(!empty($product) && $product->isNotEmpty())
                @foreach($product as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box" >
                        <div class="text-right mt-2 mr-3">
                            <span>{{ $item->name }}</span>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('website/upload/product/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid" style="height: 300px; width: 300px;">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $item->description }}</h6>
                            <h6><span>${{ $item->price }}</span></h6>
                        </div>
                        <div class="new">
                            <span>New</span>
                        </div>
                        <div class="text-center mt-2">
                            <!-- PayPal Form -->
                            <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
                                @csrf
                                <input type="hidden" name="business" value="sb-wad3w35034247@business.example.com">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="item_name" value="{{ $item->name }}">
                                <input type="hidden" name="amount" value="{{ $item->price }}">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="no_shipping" value="1">
                                <input type="hidden" name="return" value="http://127.0.0.1:8000/success">
                                <input type="hidden" name="cancel_return" value="http://127.0.0.1:8000/cancel">
                                <button type="submit" class="btn btn-primary px-3">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">No products available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- End Shop Section -->

@endsection
