@extends('layout.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <form action="{{route("checkout.payment.stripe-pay")}}" method="post" id="payment-form">
                    {{csrf_field()}}
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button>Submit Payment</button>
                </form>
            </div>
        </div>
    </div>

@endsection