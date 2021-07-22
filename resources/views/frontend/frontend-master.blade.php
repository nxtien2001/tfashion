<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tien no.1 - Fashion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/favicon.png')}}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugin.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->
                @include('frontend.header')
                <!--header end -->

                <!--pos home section-->
                <div class="pos_home_section">
                    <!--banner slider start-->

                    <!--new product area start-->
                    @yield('content')
                    <!--brand logo end-->
                </div>
                <!--pos home section end-->
            </div>
            <!--pos page inner end-->
        </div>
    </div>
    <!--pos page end-->

    <!--footer area start-->

    @include('frontend.footer')
    <!-- end footer -->

    <script src="{{asset('frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/ajax-mail.js')}}"></script>
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script>
        function addToCart(event) {
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data) {
                    if (data.code === 200) {
                        alert('Thêm giỏ hàng thành công!');
                    }
                },
                error: function() {

                }
            });
        }
        $(function() {
            $('.add_to_cart').on('click', addToCart);
        })
    </script>
    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                type: 'GET',
                url: urlUpdateCart,
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function(data) {
                    if (data.code === 200) {
                        $('.shopping_cart_area').html(data.cart);
                        alert('Cập nhật thành công!');
                    }
                },
                error: function() {}
            });
        }

        function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.table_desc').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: urlDelete,
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.code === 200) {
                        $('.shopping_cart_area').html(data.cart);
                        alert('Xóa sản phẩm ra khỏi giỏ hàng thành công!');
                    }
                },
                error: function() {}
            });
        }
        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_delete', cartDelete);
        });
    </script>
</body>

</html>