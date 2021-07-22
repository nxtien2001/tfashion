@extends('admin.dashboard')

@section('title')
<title>Add Category</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3 style="text-align: center;">Thêm mới Danh mục</h3>
        <br>
        <br>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên Danh mục</label>
                <input type="text" name="name" value="{{old('name')}}" id="name" onkeyup="ChangeToSlug();" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên Danh mục...">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Đường dẫn</label>
                <input type="text" name="slug" value="{{old('slug')}}" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Nhập đường dẫn...">
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Chọn danh mục cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thực hiện</button>
            <a class="btn btn-warning" href="{{URL::to('/category')}}">Quay lại</a>
        </form>
    </section>
</section>
@endsection