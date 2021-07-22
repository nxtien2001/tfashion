@if($carts)
<form action="#">
    <div class="row">
        <div class="col-12">
            <div class="table_desc" data-url="{{route('DeleteCart')}}">
                <div class="cart_page table-responsive update_cart_url" data-url="{{route('UpdateCart')}}">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="product_remove">Xóa</th>
                                <th>Cập nhật</th>
                                <th class="product_thumb">Ảnh sản phẩm</th>
                                <th class="product_name">Tên sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product_quantity">Số lượng</th>
                                <th class="product_total">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($carts as $id => $item)
                            @php
                            $total += $item['quantity'] * $item['price'];
                            @endphp
                            <tr>
                                <td>{{$id}}</td>
                                <td class="product_remove"><a href="" data-id="{{$id}}" class="cart_delete"><i class="fa fa-trash-o"></i></a></td>
                                <td><a href="" data-id="{{$id}}" class="btn btn-danger cart_update">Cập nhật</a></td>
                                <td class="product_thumb"><a href="#"><img src="{{asset('upload/product/'. $item['image'])}}" alt=""></a></td>
                                <td class="product_name"><a href="#">{{$item['name']}}</a></td>
                                <td class="product-price">{{number_format($item['price'])}} đ</td>
                                <td class="product_quantity"><input class="quantity" min="1" max="100" value="{{$item['quantity']}}" type="number"></td>
                                <td class="product_total">{{number_format($item['quantity'] * $item['price'])}} đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--coupon code area start-->
    <div class="coupon_area">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="coupon_code">
                    <h3>Mã giảm giá</h3>
                    <div class="coupon_inner">
                        <p>Nhập mã giảm giá nếu có.</p>
                        <input placeholder="Coupon code" type="text">
                        <button type="submit">Áp dụng</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="coupon_code">
                    <h3>Đơn giá</h3>
                    <div class="coupon_inner">
                        <div class="cart_subtotal">
                            <p>Thành tiền</p>
                            <p class="cart_amount">{{number_format($total)}}đ</p>
                        </div>
                        <div class="cart_subtotal ">
                            <p>Phí ship</p>
                            <p class="cart_amount"><span>Cố định:</span> 30,000 đ</p>
                        </div>

                        <div class="cart_subtotal">
                            <p>Tổng tiền thanh toán</p>
                            <p class="cart_amount">{{number_format($total + 30000)}}đ</p>
                        </div>
                        <div class="checkout_btn">
                            <a href="{{route('getFormPay')}}">Đi tới thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--coupon code area end-->
</form>
@else
<br><br>
<center>
    <p style="font-size: 25px;">Không có sản phẩm nào trong giỏ hàng của bạn! <i><a href="{{URL::to('/')}}">Quay lại trang chủ</a></i></p>
</center>
<br><br><br><br>
@endif