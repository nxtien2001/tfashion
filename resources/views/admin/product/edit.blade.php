@extends('admin.dashboard')

@section('title')
<title>Cập nhật sản phẩm</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <br><br>
                        <form action="{{route('products.update',$products->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control" value="{{$products->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Giá sản phẩm</label>
                                        <input type="number" name="price" min="0" class="form-control @error('price') is-invalid @enderror" value="{{$products->price}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Giá khuyến mãi</label>
                                        <input type="number" name="sale_price" min="0" class="form-control @error('sale_price') is-invalid @enderror" value="{{$products->sale_price}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Mã code</label>
                                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{$products->code}}">
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Hình ảnh</label>
                                        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image">
                                        <br>
                                        <div class="div">
                                            @if($products->image)
                                            <img src="{{asset('upload/product/' . $products->image)}}" width="200px" height="230px" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-label">Đường dẫn</label>
                                            <input type="text" name="slug" value="{{$products->slug}}" id="slug" class="form-control @error('slug') is-invalid @enderror">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Danh mục sản phẩm</label>
                                        <select class="form-control " name="category_id">
                                            <option value="">Danh mục sản phẩm</option>
                                            @foreach($category as $cate)
                                            <option value="{{$cate->id}}" {{$cate->id == $products->category_id ? 'selected' : ''}}>{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Số lượng</label>
                                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$products->quantity}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Thương hiệu sản phẩm</label>
                                        <select class="form-control " name="brand_id">
                                            <option value="">Thương hiệu sản phẩm</option>
                                            @foreach($brand as $b)
                                            <option value="{{$b->id}}" {{$b->id == $products->brand_id ? 'selected' : ''}}>{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Màu sắc</label><br>

                                        @foreach($color as $item)
                                        <label for="">
                                            <input class="form-check-input" name="id_attr[]" type="checkbox" value="{{$item->id}}">
                                            <i class="glyphicon glyphicon-file" style="color: {{$item->value}}"></i>
                                        </label>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Size</label><br>
                                        @foreach($size as $s)
                                        <label for="">
                                            <input class="form-check-input" name="id_attr[]" value="{{$s->id}}" type="checkbox">
                                        </label>
                                        {{$s->value}}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <div class="radio">
                                            <label for="">
                                                <input type="radio" name="status" value="1" checked id="">
                                                Hiện
                                            </label>
                                            <label for="">
                                                <input type="radio" name="status" value="0" id="">
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea class="form-control" name="short_content" rows="2">{{$products->short_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả chi tiết</label>
                                <textarea name="long_content" id="summary-ckeditor" class="form-control" rows="10">{{$products->short_content}}</textarea>
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Thực hiện</button>
                            <a class="btn btn-warning" href="{{URL::to('/product')}}">Quay lại</a>
                        </form>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
</section>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('products.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection