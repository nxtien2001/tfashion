@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Sản phẩm yêu thích</li>
                </ul>

            </div>
        </div>
    </div>
</div>
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area">
    @if($wishlists)
    <form action="#">
        <div class="row">
            <div class="col-12">
                <div class="table_desc wishlist">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_total">Add To Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlists as $key => $w)
                                <tr>
                                    <td class="product_remove"><a href="{{route('destroy',$w->id)}}">X</a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{asset('upload/product/'. $w->product->image)}}" width="200px" height="200px" alt=""></a></td>
                                    <td class="product_name"><a href="#">{{$w->product->name}}</a></td>
                                    <td class="product-price">{{number_format($w->product->price)}}đ</td>
                                    <td class="product_total"><a href="{{route('AddCart',['id'=>$w->id])}}">Add To Cart</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </form>
    <div class="row">
        <div class="col-12">
            <div class="wishlist-share">
                <h4>Share on:</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    @else
    <br><br>
    <center>
        <p style="font-size: 25px;">Bạn không thêm vào sản phẩm yêu thích nào! <i><a href="{{URL::to('/')}}">Quay lại trang chủ</a></i></p>
    </center>
    <br><br><br><br>
    @endif
</div>
@endsection