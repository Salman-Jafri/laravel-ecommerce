@extends('layouts.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">




            <div class="container">


                {{--<nav aria-label="breadcrumb">--}}
                    {{--<ol class="breadcrumb">--}}
                        {{--<li class="breadcrumb-item active" aria-current="page">Shop</li>--}}
                    {{--</ol>--}}
                {{--</nav>--}}

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Filters</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option selected disabled="true">Select Category</option>
                        @foreach($categories as $category)
                            <option {{ request()->category==$category->name ? "selected":""}} name="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div style="text-align: right">
                        <strong>Price:</strong>
                        <a style="color: black" href="{{route('shop.index',['category'=>request()->category,'sort'=>'asc'])}}">Low to High |</a>
                        <a style="color: black" href="{{route('shop.index',['category'=>request()->category,'sort'=>'desc'])}}"> High to Low</a>
                    </div>
                </div>



                <div class="row shop_box-top">
                    @if(session()->has('success'))

                        <div class="alert alert-success">

                            {{session()->get('success')}}

                        </div>

                    @endif



                    @foreach($products as $product)
                    <div class="col-md-3 shop_box"><a href="single.html">
                            <img src="images/pic5.jpg" class="img-responsive" alt=""/>
                            <span class="new-box">
						<span class="new-label">New</span>
					</span>
                            <span class="sale-box">
						<span class="sale-label">Sale!</span>
					</span>
                            <div class="shop_desc">
                                <h3><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></h3>
                                <p>{{$product->details}} </p>
                                <span class="reducedfrom">{{$product->increasePercent()}}</span>
                                <span class="actual">{{$product->presentPrice()}}</span><br>
                                <ul class="buttons">
                                    <li class="cart"><a href="{{route('cart.add',$product->slug)}}">Add To Cart</a></li>
                                    <li class="shop_btn"><a href="{{route('shop.show',$product->slug)}}">Read More</a></li>
                                    <div class="clear"> </div>
                                </ul>
                            </div>
                        </a>
                    </div>

                    @endforeach

                    </div>
                {{--{{$products->links()}}--}}
                {{$products->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('additional-scripts')

    <script>

        $(function () {

            $('#exampleFormControlSelect1').on('change', function()
            {
                var category = $(this).find('option:selected').attr("name");
                window.open("{{route('shop.index')}}?category="+category,"_self");
            });
        })

    </script>

@endsection