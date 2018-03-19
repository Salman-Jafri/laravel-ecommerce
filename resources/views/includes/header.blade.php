<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt=""/></a>
                    </div>
                    <div class="menu">
                        <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
                        <ul class="nav" id="nav">
                            {{--<li><a href="{{route('front.shop',1)}}">Shop</a></li>--}}
                            {{--<li class="current"><a href="{{route('front.team')}}">Team</a></li>--}}
                            {{--<li><a href="{{route('front.experience')}}">Events</a></li>--}}
                            {{--<li><a href="{{route('front.experience')}}">Experience</a></li>--}}
                            {{--<li><a href="{{route('front.shop',1)}}">Company</a></li>--}}
                            {{--<li><a href="{{route('front.contact')}}">Contact</a></li>--}}

                            <li><a href="">Shop</a></li>
                            <li class="current"><a href="">Team</a></li>
                            <li><a href="">Events</a></li>
                            <li><a href="">Experience</a></li>
                            <li><a href="">Company</a></li>
                            <li><a href="">Contact</a></li>



                            <div class="clear"></div>
                        </ul>
                        <script type="text/javascript" src="{{asset('js/responsive-nav.js')}}"></script>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="header_right">
                    <!-- start search-->
                    <div class="search-box">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <!----search-scripts---->
                    <script src="{{asset('js/classie.js')}}"></script>
                    <script src="{{asset('js/uisearch.js')}}"></script>
                    <script>
                        new UISearch( document.getElementById( 'sb-search' ) );
                    </script>
                    <ul class="icon1 sub-icon1 profile_img">
                        <li><a class="active-icon c1" href="#"> </a>
                            <ul class="sub-icon1 list">
                                <div class="product_control_buttons">
                                    <a href="#"><img src="images/edit.png" alt=""/></a>
                                    <a href="#"><img src="images/close_edit.png" alt=""/></a>
                                </div>
                                <div class="clear"></div>
                                <li class="list_img"><img src="images/1.jpg" alt=""/></li>

                                <li class="list_desc"><h4><a href="#">Cart Contents</a></h4><span class="actual">Total Items:


                                {{--<li class="list_desc"><h4><a href="#">Cart Contents</a></h4><span class="actual">Total Items: {{Cart::count()}}--}}

                                        Total Amount: </span></li>
                                {{--Total Amount: {{Cart::total()}}</span></li>--}}


                                <div class="login_buttons">

                                    {{--<div class="check_button"><a href="{{route('cart.checkout')}}">Check out</a></div>--}}

                                    <div class="check_button"><a href="">Check out</a></div>


                                    <div class="login_button"><a href="login.html">Login</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </ul>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>

