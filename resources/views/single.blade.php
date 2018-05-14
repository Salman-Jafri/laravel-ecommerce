@extends('layouts.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 single_left">
                        <div class="single_image">
                            <ul id="etalage">
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" width="280" height="500" src="/images/3.jpg" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end product_slider -->
                        <div class="single_right">
                            <h3>{{$single_product->name}}</h3>
                            <p class="m_10">{{$single_product->description}}</p>
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
                                <form>
                                    <input type="submit" value="buy now" title="">
                                </form>
                            </div>
                            <ul class="add-to-links">
                                <li><img src="/images/wish.png" alt=""><a href="#">Add to wishlist</a></li>
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
                        <div class="box-info-product">
                            <p class="price2">$130.25</p>
                            <ul class="prosuct-qty">
                                <span>Quantity:</span>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </ul>
                            <button type="submit" name="Submit" class="exclusive">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="desc">
                    <h4>Description</h4>
                    <p>{{$single_product->description}}</p>
                </div>
                <div class="row">
                    <h4 class="m_11">Related Products in the same Category</h4>
                    @foreach($products as $product)
                    <div class="col-md-4 product1">
                        <img src="/images/s1.jpg" class="img-responsive" alt=""/>
                        <div class="shop_desc"><a href="{{route('shop.show',$product->slug)}}">
                            </a><h3><a href="{{route('shop.show',$product->slug)}}"></a><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></h3>
                            <p>{{$product->details}} </p>
                            <span class="reducedfrom">{{$product->increasePercent()}}</span>
                            <span class="actual">{{$product->presentPrice()}}</span><br>
                            <ul class="buttons">
                                <li class="cart"><a href="#">Add To Cart</a></li>
                                <li class="shop_btn"><a href="#">Read More</a></li>
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