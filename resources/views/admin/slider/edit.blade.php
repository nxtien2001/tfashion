@extends('admin.dashboard')

@section('title')
<title>Cập nhật slider</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật slider
                        </header>
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <br><br>
                        <form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên slider</label>
                                <input type="text" value="{{$slider->name}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tên slider">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="" rows="3">{{$slider->content}}</textarea>
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Chọn ảnh</label><br>
                                <input type="file" name="image"><br>
                                <div class="div">
                                    @if($slider->image)
                                    <img src="{{asset('upload/product/' . $slider->image)}}" width="400px" height="250px" alt="">
                                    @endif
                                </div>
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