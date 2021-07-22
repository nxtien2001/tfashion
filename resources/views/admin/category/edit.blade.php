@extends('admin.dashboard')

@section('title')
<title>Update Category</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3 style="text-align: center;">Cập nhật danh mục</h3>
        <br>
        <br>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <form action="{{route('categories.update', $category->id)}}" method="post">
            @csrf
            <input type="hidden" name="id" id="" value="{{$category->id}}">
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Đường dẫn</label>
                <input type="text" name="slug" value="{{$category->slug}}" class="form-control @error('slug') is-invalid @enderror">
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="status" class="form-control">
                    <option value="1" {{$category->status=='1' ? 'selected' : ''}}>Hiển thị</option>
                    <option value="0" {{$category->status=='0' ? 'selected' : ''}}>Ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thực hiện</button>
            <a class="btn btn-warning" href="{{URL::to('/category')}}">Quay lại</a>
        </form>
    </section>
</section>
@endsection