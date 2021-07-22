@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Giỏ hàng của bạn</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->



<!--shopping cart area start -->
<div class="shopping_cart_area">
    @include('pages.cart')
</div>
@endsection