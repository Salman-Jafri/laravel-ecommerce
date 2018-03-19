@extends('layout.main')

@section('main-content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            @if(Cart::count()==0)
                <h4 class="title">Shopping cart is empty</h4>
                <p class="cart">You have no items in your shopping cart.<br>Click<a href="{{route('front.index')}}"> here</a> to continue shopping</p>
            @else

                <h1 style="text-align: center;padding: 50px">Cart Details</h1>
                <table class="table">

                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Color</th>

                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{$cartItem->id}}</td>
                        <td>{{$cartItem->name}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->qty}}</td>
                        <td>{{$cartItem->options->color}}</td>
                        <td class="btn btn-danger"><a style="text-decoration: none;color: white" href="{{route('cart.remove',$cartItem->rowId)}}">Remove from Cart</a></td>


                    </tr>
                @endforeach
                    <tr>
                        <td colspan="2" align="center">Grand Total</td>
                        <td>{{Cart::total()}}</td>
                        <td></td>
                        <td></td>
                        <td><a class="btn btn-primary" style="text-decoration: none;color: white" href="{{route('checkout.address')}}">Proceed</a></td>
                    </tr>

                </table>

            @endif
        </div>
    </div>
</div>


@endsection