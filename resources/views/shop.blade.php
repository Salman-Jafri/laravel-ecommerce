@extends('layout.main')

@section('main-content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row shop_box-top">
                @foreach($products as $product)
                <div class="col-md-3 shop_box"><a href="{{route('front.single',$product->ID)}}">
                        <img src="{{$product->IMAGE}}" class="img-responsive" alt="http://via.placeholder.com/350x150"/>
					<span class="new-box">
						<span class="new-label">New</span>
					</span>
					<span class="sale-box">
						<span class="sale-label">Sale!</span>
					</span>
                        <div class="shop_desc">
                            <h3><a href="{{route('front.single',$product->ID)}}">{{$product->POST_NAME}}</a></h3>
                            <p>{{$product->POST_CONTENT}}</p>
                            <span class="reducedfrom">{{$product->PRICE+($product->PRICE*0.1)}}</span>
                            <span class="actual">{{$product->PRICE}}</span><br>
                            <ul class="buttons">
                                <li class="cart"><a href="#">Add To Cart</a></li>
                                <li class="shop_btn"><a href="#">Read More</a></li>
                                <div class="clear"> </div>
                            </ul>
                        </div>
                    </a>
                </div>
                    @endforeach

            </div>
        </div>
    </div>
    <div id="pages-buttons">

        <?php

        $pagenumbers = array();
        $count_i = 0;


        ?>


        @if(!empty($counter))


            @for($i=$id-1;$i>abs($id-5);$i--)

                <?php

                    array_push($pagenumbers,$i)
                ?>


            @endfor


            @for($i=$id;$i<$id+5;$i++)


                @if($i>$counter)

                        @break

                @endif
                    <?php

                        array_push($pagenumbers,$i)

                    ?>

            @endfor

                <?php

                    sort($pagenumbers);

                ?>

            @for($i=0;$i<count($pagenumbers);$i++)

                @if($pagenumbers[$i]==$id)

                        <a style="color:black" href="{{route('front.shop',$pagenumbers[$i])}}">{{$pagenumbers[$i]}}</a>

                @else

                        <a style="color: dimgrey" href="{{route('front.shop',$pagenumbers[$i])}}">{{$pagenumbers[$i]}}</a>


                @endif


            @endfor


        @endif
    </div>

</div>

    @endsection