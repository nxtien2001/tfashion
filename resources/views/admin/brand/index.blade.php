@extends('admin.dashboard')

@section('title')
<title>Brand</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thương hiệu sản phẩm
                </div>
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                @if(session('mess'))
                <div class="alert alert-success">{{session('mess')}}</div>
                @endif
                @if(session('actived'))
                <div class="alert alert-success">{{session('actived')}}</div>
                @else(session('active'))
                <div class="alert alert-success">{{session('active')}}</div>
                @endif
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a class="btn btn-success" href="{{route('brand.create')}}">Thêm mới</a>
                        <a class="btn btn-primary" href="{{URL::to('/brand')}}">Tất cả</a>
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
                                <th>Tên thương hiệu</th>
                                <th>Trạng thái</th>
                                <th style="width:30px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $key => $brand)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$key+1}}</td>
                                <td>{{$brand->name}}</td>
                                <td>
                                    <?php
                                    if ($brand->status == 1) {
                                    ?>
                                        <a href="{{URL::to('/activeBrand/' . $brand->id)}}" class="btn btn-danger">Hiển thị</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="{{URL::to('/unactiveBrand/' . $brand->id)}}" class="btn btn-secondary">ẨN</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{route('brand.delete',$brand->id)}}" onclick="return  confirm('Bạn có chắc chắn muốn xóa?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                                    <a href="{{route('brand.edit',$brand->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-7 text-right text-center-xs">
                            {{$brands->appends(request()->all())->links()}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection