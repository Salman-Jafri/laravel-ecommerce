@extends('layout.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">
            <div class="container">


                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="cultpersonalitysalman@gmail.com">

                    <?php

                    use Gloudemans\Shoppingcart\Facades\Cart;
                    $cartItems = Cart::content();
                    $count = 1;
                    ?>

                    @foreach($cartItems as $cartItem)

                        <input type="hidden" name="item_name_{{$count}}" value={{$cartItem->name}}>
                        <input type="hidden" name="amount_{{$count}}" value="{{$cartItem->price}}">
                        <input type="hidden" name="shipping_{{$count}}" value="0">

                        <?php

                            $count++;

                        ?>
                    @endforeach

                    <input type="submit" value="PayPal">
                </form>


            </div>
        </div>
    </div>


@endsection