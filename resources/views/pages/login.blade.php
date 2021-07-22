@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Đăng nhập</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <!--login area start-->
        <div class="col-lg-12 col-md-6">
            <div class="account_form">
                <h2>Đăng nhập</h2>
                <form action="{{route('getLogin')}}" method="post">
                    @csrf
                    <p>
                        <label>Email <span>*</span></label>
                        <input type="text" value="{{old('email')}}" name="email">
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Đăng nhập</button>
                        <label for="remember">
                            <input id="remember" type="checkbox">
                            Remember me
                        </label>
                        <a href="{{route('getResign')}}">Bạn chưa có tài khoản?</a>
                    </div>

                </form>
            </div>
        </div>
        <!--login area start-->
        <!--register area end-->
    </div>
</div>
@endsection