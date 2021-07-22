<div class="header_area">
    <!--header top-->
    <div class="header_top">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header_links">
                    <ul>
                        @php
                        $qty = App\Models\Wishlist::where('user_id',Auth::id())->get();
                        $wish = App\Models\Wishlist::where('user_id',Auth::id())->get();
                        @endphp
                        @if( Auth::user())
                        <li><a href="{{route('ShowCart')}}" title="My cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                    <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                <b> {{count($qty)}}</b>
                            </a></li>
                        <li><a href="{{route('wishPage')}}" title="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                </svg>
                                <b> {{count($wish)}}</b>
                            </a></li>
                        <li>
                            <a href="" title="My account">
                                <h6> {{ Auth::user() ->name}}</h6>
                            </a>
                        </li>
                        <li><a href="{{route('getLogout')}}" title="My account">Thoát</a></li>
                        @else
                        <li><a href="{{route('ShowCart')}}" title="My cart">Giỏ hàng</a></li>
                        <li><a href="{{route('getLogin')}}" title="Login">Đăng nhập</a></li>
                        <li><a href="{{route('getResign')}}" title="Login">Đăng ký</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--header top end-->

    <!--header middel-->
    <div class="header_middel">
        <div class="row align-items-center">
            <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{URL::to('/')}}"><img src="{{asset('frontend/img/logo/logo.jpg.png')}}" alt=""></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-9 col-md-9">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="#">
                            <input name="key" placeholder="Search..." type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <div class="header_bottom">
        <div class="row">
            <div class="col-12">
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{URL::to('/')}}">Trang chủ</a>
                                </li>
                                @foreach($categories as $cate)
                                <li><a href="{{route('view',['id'=>$cate->id])}}">{{$cate->name}}</a>
                                    <div class="mega_menu jewelry">
                                        <div class="mega_items jewelry">
                                            @include('frontend.menuChild',['cate'=>$cate])
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <li><a href="contact.html">Liên hệ</a></li>

                            </ul>
                        </nav>
                    </div>
                    <!-- RESPONSIVE MENU -->
                    <div class="mobile-menu d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="{{URL::to('/')}}">Trang chủ</a>
                                    @foreach($categories as $cate)
                                <li><a href="{{route('view',['id'=>$cate->id])}}">{{$cate->name}}</a>
                                    <div>
                                        <div>
                                            @include('frontend.menuChild',['cate'=>$cate])
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- END RESPONSIVE -->
                </div>
            </div>
        </div>
    </div>
</div>