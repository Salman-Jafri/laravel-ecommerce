@extends('layouts.main')





@section('main-content')

    @include('includes.banner')
<div class="main">
    <div class="content-top">
        <h2>snowboards</h2>
        <p>hendrerit in vulputate velit esse molestie consequat, vel illum dolore</p>
        <div class="close_but"><i class="close1"> </i></div>
        <ul id="flexiselDemo3">

            {{--@foreach($products as $product)--}}

            <li><img src="images/board1.jpg" /></li>
            <li><img src="images/board2.jpg" /></li>
            <li><img src="images/board3.jpg" /></li>
            <li><img src="images/board4.jpg" /></li>
            <li><img src="images/board5.jpg" /></li>
            {{--<li><img src="{{$product->IMAGE}}" /></li>--}}

            {{--@endforeach--}}

        </ul>
        <h3>SnowBoard Extreme Series</h3>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 5,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="{{asset('/js/jquery.flexisel.js')}}"></script>
    </div>
</div>
@endsection

@section('content-bottom')
<div class="content-bottom">
    <div class="container">
        <div class="row content_bottom-text">
            <div class="col-md-7">
                <h3>The Mountains<br>Snowboarding</h3>
                <p class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio.</p>
                <p class="m_2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
    <div class="features">
        <div class="container">
            <h3 class="m_3">Features</h3>
            <div class="close_but"><i class="close1"> </i></div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3 top_box">
                    <div class="view view-ninth"><a href="{{route('shop.show',$product->slug)}}">
                            <img src="/images/pic1.jpg" class="img-responsive" alt=""/>
                            <div class="mask mask-1"> </div>
                            <div class="mask mask-2"> </div>
                            <div class="content">
                                <h2>{{$product->name}}</h2>
                                <p>{{$product->details}}</p>
                            </div>
                        </a>
                </div>
                <h4 class="m_4"><a href="#"></a>{{$product->name}}</h4>
                <p class="m_5">{{$product->details}}</p>
                </div>
                @endforeach
        </div>
    </div>
    </div>
@endsection
