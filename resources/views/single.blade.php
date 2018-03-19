@extends('layout.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 single_left">
                    <div class="single_image" >

                                <a>
                                    <img style="width: 350px;height: 500px"  src="{{$product_data->IMAGE}}" />
                                </a>


                    </div>
                    <!-- end product_slider -->
                    <div class="single_right">
                        <h3>{{$product_data->POST_NAME}} </h3>
                        <p class="m_10">{{$product_data->POST_CONTENT}}</p>
                        <ul class="options">
                            <h4 class="m_12">Select a Size(cm)</h4>
                            <li><a href="#">151</a></li>
                            <li><a href="#">148</a></li>
                            <li><a href="#">156</a></li>
                            <li><a href="#">145</a></li>
                            <li><a href="#">162(w)</a></li>
                            <li><a href="#">163</a></li>
                        </ul>
                        <ul class="product-colors">
                            <h3>available Colors</h3>
                            <li><a class="color1" href="#"><span> </span></a></li>
                            <li><a class="color2" href="#"><span> </span></a></li>
                            <li><a class="color3" href="#"><span> </span></a></li>
                            <li><a class="color4" href="#"><span> </span></a></li>
                            <li><a class="color5" href="#"><span> </span></a></li>
                            <li><a class="color6" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="btn_form">
                            <form method="get" action="{{route('cart.add',$product_data->ID)}}">
                                <div class="box-info-product">
                                    <p class="price2">Rs.{{$product_data->PRICE}}</p>
                                    <button type="submit" class="exclusive">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <ul class="add-to-links">
                            <li><img src="images/wish.png" alt=""><a href="#">Add to wishlist</a></li>
                        </ul>
                        <div class="social_buttons">
                            <h4>95 Items</h4>
                            <button type="button" class="btn1 btn1-default1 btn1-twitter" onclick="">
                                <i class="icon-twitter"></i> Tweet
                            </button>
                            <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
                                <i class="icon-facebook"></i> Share
                            </button>
                            <button type="button" class="btn1 btn1-default1 btn1-google" onclick="">
                                <i class="icon-google"></i> Google+
                            </button>
                            <button type="button" class="btn1 btn1-default1 btn1-pinterest" onclick="">
                                <i class="icon-pinterest"></i> Pinterest
                            </button>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="desc">
                <h4>Description</h4>
                <p>{{$product_data->POST_CONTENT}}</p>
            </div>
            <div class="row">
                <h4 class="m_11">Related Products in the same Category</h4>
                @foreach($products as $product)
                    <div class="col-md-4 product1">
                        <img src="{{$product->IMAGE}}" class="img-responsive" alt=""/>
                        <div class="shop_desc"><a href="{{route('front.single',$product->ID)}}">
                            </a><h3><a href="{{route('front.single',$product->ID)}}"></a><a href="#">{{$product->POST_NAME}}</a></h3>
                            <p>{{$product->POST_CONTENT}}</p>
                            <span class="reducedfrom">{{$product->PRICE+($product->PRICE*0.1)}}</span>
                            <span class="actual">{{$product->PRICE}}</span><br>
                            <ul class="buttons">
                                <li class="cart"><a href="{{route('cart.add',$product->ID)}}">Add To Cart</a></li>
                                <li class="shop_btn"><a href="{{route('front.single',$product->ID)}}">Read More</a></li>
                                <div class="clear"> </div>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection