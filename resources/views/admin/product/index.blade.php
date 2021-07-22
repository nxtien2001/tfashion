@extends('admin.dashboard')

@section('title')
<title>Product</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý sản phẩm
                </div>
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a class="btn btn-success" href="{{route('products.create')}}">Thêm mới</a>
                        <a class="btn btn-primary" href="{{URL::to('/product')}}">Tất cả</a>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <form action="">
                            <div class="input-group">
                                <input type="text" name="key" class="input-sm form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-default" type="submit">Go!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Stt</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Mã code</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Màu sắc</th>
                                <th>Size</th>
                                <th style="width:30px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$key+1}}</td>
                                <td>{{$pro->name}}</td>
                                <td>{{number_format($pro->price)}}đ</td>
                                <td>{{isset($pro->category->name) ? $pro->category->name : "[Đã xóa]" }}</td>
                                <td>{{isset($pro->brand->name) ? $pro->brand->name : "[Đã xóa]" }}</td>
                                <td>{{$pro->code}}</td>
                                <td>
                                    <img src="{{ asset('upload/product/' . $pro->image) }}" height="100" width="100" />
                                </td>
                                <td>{{$pro->quantity}}</td>
                                <td>{{isset($pro->Atrr->color) ? $pro->Atrr->color : "[Không hiển thị được]" }}</td>
                                <td>{{isset($pro->Atrr->size) ? $pro->Atrr->size : "[Không hiển thị được]" }}</td>
                                <td>
                                    <a href="{{route('products.delete',$pro->id)}}" onclick="return  confirm('Bạn có chắc chắn muốn xóa?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                                    <a href="{{route('products.edit',$pro->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-7 text-right text-center-xs">
                            {{$products->appends(request()->all())->links()}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection