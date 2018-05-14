<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://js.stripe.com/v3/"></script>
@extends('layouts.main')
<link href="{{asset('/css/checkout.css')}}" rel='stylesheet' type='text/css'/>
@section('main-content')
    <div class="main">
        <div class="shop_top">
            <div class="container">

                @if(session()->has('success'))

                    <div class="alert alert-success">

                        {{session()->get('success')}}

                    </div>

                @endif


                @if(count($errors)>0)

                    <div class="alert alert-danger">

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>{{$error}}</li>

                            @endforeach

                        </ul>

                    </div>


                @endif


                <div class="row">
                    <div class="col-75">
                        <div class="container">
                            <h1 style="text-align: center">Checkout Form</h1><br><br>
                            <form action="{{route('checkout.store')}}" method="post" id="payment-form">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-50">
                                        <h3>Billing Address</h3>
                                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                        <input type="text" id="fname" name="name" value="{{old('fname')}}" placeholder="John M. Doe" required>
                                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" value="{{old('email')}}" name="email" placeholder="john@example.com" required>
                                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                        <input type="text" id="adr" value="{{old('address')}}" name="address" placeholder="542 W. 15th Street" required>
                                        <label for="city"><i class="fa fa-institution"></i> City</label>
                                        <input type="text" id="city" value="{{old('city')}}" name="city"  placeholder="New York" required>

                                        <div class="row">
                                            <div class="col-50">
                                                <label for="state">State</label>
                                                <input type="text" id="state" name="state" value="{{old('state')}}" placeholder="NY" required>
                                            </div>
                                            <div class="col-50">
                                                <label for="zip">Zip</label>
                                                <input type="text" id="zip" name="zip" value="{{old('zip')}}" placeholder="10001" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-50">
                                        <h3>Payment</h3>
                                        <label for="fname">Accepted Cards</label>
                                        <div class="icon-container">
                                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                                        </div>
                                        <label for="cname">Name on Card</label>
                                        <input type="text" id="cname" name="cardname" value="{{old('cardname')}}" placeholder="John More Doe" required>
                                        <label for="ccnum">Credit card number</label>
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>


                                    </div>


                                <label>
                                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                                </label>
                                <input type="submit" id="full_form" value="Proceed" class="btn">
                            </form>
                        </div>
                    </div>

                    <div class="col-25">
                        <div class="container">

                            <br><br>
                            <h2>Product Details
                                <span class="price" style="color:black">
                                  <i class="fa fa-shopping-cart"></i>
                                  <b>{{Cart::count()}}</b>
                                </span>
                            </h2>
                            <br><br>
                            @foreach(Cart::content() as $cartItem)
                            <p><a href="#">{{$cartItem->name}}</a> <span class="price">Rs. {{$cartItem->price}}</span></p>

                            <hr>
                            @endforeach
                            <p>Total <span class="price" style="color:black"><b>Rs. {{(Cart::total())}}</b></span></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <section class="panel-heading">

    </section>
    <div class="row shop_box-top">

    </div>

@endsection
@section('additional-scripts')
<script>

    // Create a Stripe client.
    var stripe = Stripe('pk_test_95co3BUeREiM37fKja9cYizp');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style,
        hidePostalCode:true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        document.getElementById('full_form').disabled = true;
        var options = {
            name  : document.getElementById('cname').value,
            //email : document.getElementById('email').value,
            address_line1 : document.getElementById('adr').value,
            address_city : document.getElementById('city').value,
            address_state : document.getElementById('state').value,
            address_zip : document.getElementById('zip').value

        };

        stripe.createToken(card,options).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                errorElement.textContent = result.error.message;


                document.getElementById('full_form').disabled = false;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

</script>
@endsection