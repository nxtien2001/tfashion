@extends('admin.dashboard')

@section('title')
<title>Thêm mới sản phẩm</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới sản phẩm
                        </header>
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <br><br>
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Giá sản phẩm</label>
                                        <input type="number" name="price" min="0" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Giá khuyến mãi</label>
                                        <input type="number" name="sale_price" min="0" class="form-control @error('sale_price') is-invalid @enderror" value="{{old('sale_price')}}">
                                        @error('sale_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Mã code</label>
                                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}">
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Hình ảnh</label>
                                        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image">
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-label">Đường dẫn</label>
                                            <input type="text" name="slug" value="{{old('slug')}}" id="slug" class="form-control @error('slug') is-invalid @enderror">
                                            @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Danh mục sản phẩm</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            <option value=""></option>
                                            @foreach($category as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @if($cate->childrent)
                                            @foreach($cate->childrent as $c)
                                            <option value="{{$cate->id}}"> -- {{$c->name}}</option>
                                            @endforeach
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Số lượng</label>
                                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}" placeholder="Số lượng sản phẩm...">
                                        @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Thương hiệu sản phẩm</label>
                                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                                            <option value=""></option>
                                            @foreach($brand as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Màu sắc</label><br>

                                        @foreach($color as $item)
                                        <label for="">
                                            <input class="form-check-input @error('id_attr') is-invalid @enderror" name="id_attr[]" type="checkbox" value="{{$item->id}}">
                                            <i class="glyphicon glyphicon-file" style="color: {{$item->value}}"></i>
                                        </label>
                                        @endforeach
                                        @error('id_attr')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Size</label><br>
                                        @foreach($size as $s)
                                        <label for="">
                                            <input class="form-check-input @error('id_attr') is-invalid @enderror" name="id_attr[]" value="{{$s->id}}" type="checkbox">
                                        </label>
                                        {{$s->value}}
                                        @endforeach
                                        @error('id_attr')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                <textarea class="form-control @error('short_content') is-invalid @enderror" name="short_content" rows="5">{{ old('short_content') }}</textarea>
                                @error('short_content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả chi tiết</label>
                                <textarea name="long_content" id="summary-ckeditor" class="form-control @error('short_content') is-invalid @enderror" rows="10">{{ old('long_content') }}</textarea>
                                @error('long_content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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