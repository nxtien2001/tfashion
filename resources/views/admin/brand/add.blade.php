@extends('admin.dashboard')

@section('title')
<title>Add Brand</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3 style="text-align: center;">Thêm mới thương hiệu</h3>
        <br>
        <br>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <form action="{{route('brand.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên thương hiệu</label>
                <input type="text" name="name" value="{{old('name')}}" id="name" onkeyup="ChangeToSlug();" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thực hiện</button>
            <a class="btn btn-warning" href="{{URL::to('/brand')}}">Quay lại</a>
        </form>
    </section>
</section>
@endsection