@extends('admin.dashboard')

@section('title')
<title>Thêm slider</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm slider
                        </header>
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <br><br>
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên slider</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="content" value="" class="form-control @error('content') is-invalid @enderror" id="" rows="3">{{old('content')}}</textarea>
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Chọn ảnh</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Thực hiện</button>
                            <a class="btn btn-warning" href="{{URL::to('/slider')}}">Quay lại</a>
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