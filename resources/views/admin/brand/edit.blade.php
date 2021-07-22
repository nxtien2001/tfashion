@extends('admin.dashboard')

@section('title')
<title>Update Brand</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3 style="text-align: center;">Cập nhật thương hiệu</h3>
        <br>
        <br>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <form action="{{route('brand.update', $brand->id)}}" method="post">
            @csrf
            <input type="hidden" name="id" id="" value="{{$brand->id}}">
            <div class="mb-3">
                <label class="form-label">Tên thương hiệu</label>
                <input type="text" name="name" value="{{$brand->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="status" class="form-control">
                    <option value="1" {{$brand->status=='1' ? 'selected' : ''}}>Hiển thị</option>
                    <option value="0" {{$brand->status=='0' ? 'selected' : ''}}>Ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thực hiện</button>
            <a class="btn btn-warning" href="{{URL::to('/brand')}}">Quay lại</a>
        </form>
    </section>
</section>
@endsection