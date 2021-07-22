@extends('admin.dashboard')

@section('title')
<title>Categories</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh mục sản phẩm
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
                        <a class="btn btn-success" href="{{route('categories.create')}}">Thêm mới</a>
                        <a class="btn btn-primary" href="{{URL::to('/category')}}">Tất cả</a>
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
                                <th>Tên danh mục</th>
                                <th>Thuộc danh mục</th>
                                <th>Trạng thái</th>
                                <th style="width:30px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $cate)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$key+1}}</td>
                                <td>{{$cate->name}}</td>
                                <td>
                                    @if($cate->parent_id == 0 )
                                    <b style="color: red;">Danh mục cha</b>
                                    @else
                                    @foreach($cateChildrent as $cate_child)
                                    @if($cate_child->id == $cate->parent_id)
                                    <span style="color: green;">{{$cate_child->name}}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    if ($cate->status == 1) {
                                    ?>
                                        <a href="{{URL::to('/activeCategory/' . $cate->id)}}" class="btn btn-danger">Hiển thị</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="{{URL::to('/unactiveCategory/' . $cate->id)}}" class="btn btn-secondary">ẨN</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{route('categories.delete',$cate->id)}}" onclick="return  confirm('Bạn có chắc chắn muốn xóa?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                                    <a href="{{route('categories.edit',$cate->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-7 text-right text-center-xs">
                            {{$categories->appends(request()->all())->links()}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection