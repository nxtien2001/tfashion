@extends('frontend.frontend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="banner_slider slider_two">
            <div class="slider_active owl-carousel">
                @foreach($slider as $s)
                <div class="single_slider">
                    <img src="{{asset('upload/product/' . $s->image)}}" height="550px" alt="">
                    <div class="slider_content">
                        <div class="slider_content_inner">
                            <h1>{{$s->name}}</h1>
                            <p>{{$s->content}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--banner slider start-->
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }} <a href="{{route('wishPage')}}">đi tới danh sách yêu thích</a>
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-danger">
    {{ session()->get('message') }}
</div>
@endif
<div class="new_product_area product_two">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3> Sản phẩm mới</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach($topProducts as $pro)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{route('view',['id'=>$pro->id])}}"><img src="{{asset('upload/product/'.$pro->image)}}" alt=""></a>
                        <div class="img_icone">
                            <img src="{{asset('frontend/img/cart/span-new.png')}}" alt="">
                        </div>
                        <div class="product_action">
                            <a href="" data-url="{{route('AddCart',['id'=>$pro->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">{{number_format($pro->price)}}đ</span>
                        <h3 class="product_title"><a href="{{route('view',['id'=>$pro->id])}}">{{$pro->name}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="{{route('addtowishlist',['id'=>$pro->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--new product area start-->

<!--banner area start-->
<div class="banner_area banner_two">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="single_banner">
                <a href="#"><img src="{{asset('frontend/img/banner/banner7.jpg')}}" alt=""></a>
                <div class="banner_title">
                    <p>Up to <span> 40%</span> off</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_banner">
                <a href="#"><img src="{{asset('frontend/img/banner/banner8.jpg')}}" alt=""></a>
                <div class="banner_title title_2">
                    <p>sale off <span> 30%</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_banner">
                <a href="#"><img src="{{asset('frontend/img/banner/banner11.jpg')}}" alt=""></a>
                <div class="banner_title title_3">
                    <p>sale off <span> 30%</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->

<!--featured product area start-->
<div class="new_product_area product_two">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3>Sản phẩm khuyến mại</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach($sale_products as $sale)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{route('view',['id'=>$sale->id])}}"><img src="{{asset('upload/product/'.$sale->image)}}" alt=""></a>
                        <div class="img_icone">
                            <img src="{{asset('frontend/img/cart/span-new.png')}}" alt="">
                        </div>
                        <div class="product_action">
                            <a href="" data-url="{{route('AddCart',['id'=>$sale->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        @if($sale->sale_price > 0)
                        <i style="font-size: 17px;"><del>
                                {{number_format($sale->price)}}đ
                            </del></i>
                        <span class="product_price">{{number_format($sale->sale_price)}}đ</span>
                        @else
                        <span class="product_price">{{number_format($sale->price)}}đ</span>
                        @endif
                        <h3 class="product_title"><a href="{{route('view',['id'=>$sale->id])}}">{{$sale->name}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="{{route('addtowishlist',['id'=>$sale->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--featured product area start-->

<!--blog area start-->
<div class="blog_area blog_two">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="{{asset('frontend/img/blog/blog3.jpg')}}" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Tech</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="{{asset('frontend/img/blog/blog4.jpg')}}" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Men</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="{{asset('frontend/img/blog/blog1.jpg')}}" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Women</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--blog area end-->

<!--brand logo strat-->
<div class="brand_logo brand_two">
    <div class="block_title">
        <h3>Brands</h3>
    </div>
    <div class="row">
        <div class="brand_active owl-carousel">
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{{asset('frontend/img/brand/brand1.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{{asset('frontend/img/brand/brand2.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{{asset('frontend/img/brand/brand3.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{{asset('frontend/img/brand/brand4.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{{asset('frontend/img/brand/brand5.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{{asset('frontend/img/brand/brand6.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection