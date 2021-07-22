@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Đăng kí</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="row">
        <!--login area start-->

        <!--register area start-->

        <div class="col-lg-12 col-md-6">
            <div class="account_form register">
                <h2>Đăng kí</h2>
                <form action="#" method="post">
                    @csrf
                    <p>
                        <label>Email <span>*</span></label>
                        <input type="text" name="email">
                    </p>
                    <p>
                        <label>Họ tên khách hàng<span>*</span></label>
                        <input type="text" name="name">
                    </p>
                    <p>
                        <label>Số điện thoại <span>*</span></label>
                        <input type="text" name="phone">
                    </p>
                    <p>
                        <label>Địa chỉ <span>*</span></label>
                        <input type="text" name="address">
                    </p>
                    <p>
                        <label>Mật khẩu <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--register area end-->
</div>
@endsection