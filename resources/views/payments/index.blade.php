@extends('layout.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">
            <div class="container">


                <a href="{{route('checkout.payment.stripe')}}">Pay with Stripe</a>
                <a href="{{route('checkout.payment.paypal')}}">Pay with Paypal</a>


            </div>
        </div>
    </div>


@endsection