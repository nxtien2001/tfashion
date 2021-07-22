@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Thanh toán</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Bạn chưa đăng nhập?
                    <a class="Returning" href="{{route('getLogin')}}" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click vào đây để đăng nhập</a>

                </h3>
                <div id="checkout_login" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                        <form action="#">
                            <div class="form_group mb-20">
                                <label>Username or email <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group mb-25">
                                <label>Password <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group group_3 ">
                                <input value="Login" type="submit">
                                <label for="remember_box">
                                    <input id="remember_box" type="checkbox">
                                    <span> Remember me </span>
                                </label>
                            </div>
                            <a href="#">Lost your password?</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="user-actions mb-20">
                <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <form action="#">
                            <input placeholder="Coupon code" type="text">
                            <input value="Apply coupon" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="" method="post">
                    @csrf
                    <h3>Chi tiết hóa đơn</h3>
                    <div class="row">
                        <div class="col-12 mb-30">
                            <label>Họ và tên <span>*</span></label>
                            <input type="text">
                        </div>

                        <!-- <div class="col-12 mb-30">
                            <label>Street address <span>*</span></label>
                            <input placeholder="House number and street name" type="text">
                        </div>
                        <div class="col-12 mb-30">
                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Town / City <span>*</span></label>
                            <input type="text">
                        </div> -->
                        <div class="col-12 mb-30">
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" placeholder="Thôn - Xã - Huyện - Thành Phố">
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Số điện thoại<span>*</span></label>
                            <input type="text">

                        </div>
                        <div class="col-lg-6 mb-30">
                            <label> Email <span>*</span></label>
                            <input type="text">

                        </div>
                        <div class="col-12 mb-30">
                            <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <label> Account password <span>*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" id="" name="note" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <form action="" method="post">
                    @csrf
                    <h3>Đơn hàng của bạn</h3>
                    <div class="order_table table-responsive mb-30">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach($carts as $key => $item)
                                @php
                                $total += $item['quantity'] * $item['price'];
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{asset('upload/product/'. $item['image'])}}" width="80px" height="80px" alt="">
                                    </td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>{{number_format($item['quantity'] * $item['price'])}} đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td>{{number_format($total)}}đ</td>
                                </tr>
                                <tr>
                                    <th>Phí ship cố định</th>
                                    <td><strong>30,000 đ</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Tổng tiền thanh toán</th>
                                    <td><strong>{{number_format($total + 30000)}}đ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default">
                            <input id="payment" name="check_method" type="radio" data-target="createp_account">
                            <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh toán khi nhận hàng</label>

                            <div id="method" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="panel-default">
                            <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">
                            <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Thanh toán online <img src="assets\img\visha\papyel.png" alt=""></label>

                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="order_button">
                            <button type="submit">Xác nhận đơn hàng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection