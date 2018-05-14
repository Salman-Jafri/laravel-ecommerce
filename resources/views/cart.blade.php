<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@extends('layouts.main')

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

                @if(Cart::count()==0)
                <h4 class="title">Shopping cart is empty</h4>
                <p class="cart">You have no items in your shopping cart.<br>Click<a href=""> here</a> to continue shopping</p>

                @else

            <section class="jumbotron text-center">
                <h2>Shopping Cart</h2>
            </section>

            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Available</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-center"></th>
                                    <th scope="col" class="text-right">Price</th>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $item)
                                <tr>
                                    <?php
                                    $product = \App\Product::findorfail($item->id);
                                    ?>
                                    <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                    <td>{{$item->name}}</td>
                                    <td>In stock</td>
                                    <td><input class="form-control" data-id="{{$item->rowId}}" min="1" max="5" type="number" value="{{$item->qty}}" /></td>
                                    <td style="font-size: 10px"><a href="{{route('cart.saveforlater',$item->rowId)}}">Save for later</a></td>
                                    <td class="text-right">{{number_format($item->price)}}<div style="font-size: 10px">Per Item</div> </td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-danger" href="{{route('cart.remove',$item->rowId)}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub-Total</td>
                                    <td id="sub-total" class="text-right">{{(Cart::subtotal())}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tax</td>
                                    <td id="tax" class="text-right">{{(Cart::tax())}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td id="total" class="text-right"><strong>{{(Cart::total())}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
                                <a href="{{route('shop.index')}}" class="btn btn-block btn-light">CONTINUE SHOPPING</a>
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a class="btn btn-lg btn-block btn-success text-uppercase" href="{{route('checkout.index')}}">Checkout</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
                @endif
        </div>
    </div>
</div>
<section class="panel-heading">
    <h2>{{Cart::instance('saveforlater')->count()}} Item(s) Saved for later</h2>
</section>
<div class="row shop_box-top">
    @foreach(Cart::instance('saveforlater')->content() as $product)
        <div class="col-md-3 shop_box"><a href="single.html">
                <img src="images/pic5.jpg" class="img-responsive" alt=""/>
                <span class="new-box">
                                        <span class="new-label">New</span>
                                    </span>

                <?php
                $item = \App\Product::findorfail($product->id);
                ?>
                <span class="sale-box">
                                        <span class="sale-label">Sale!</span>
                                    </span>
                <div class="shop_desc">
                    <h3><a href="{{route('cart.add',$item->slug)}}">{{$product->name}}</a></h3>
                    <span class="actual">Rs. {{number_format($product->price)}}</span><br>
                    <ul class="buttons">
                        <li class="cart"><a href="{{route('cart.add',$item->slug)}}">Move To Cart </a></li>
                        <li class="shop_btn"><a href="{{route('cart.remove.saveforlater',$product->rowId)}}">Remove</a></li>
                        <div class="clear"> </div>
                    </ul>
                </div>
            </a>
        </div>

    @endforeach

</div>

@endsection

@section('additional-scripts')

    <script src="{{asset('/js/updateQuantity.js')}}"></script>

    @endsection