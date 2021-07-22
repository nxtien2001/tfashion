@extends('admin.dashboard')

@section('title')
<title>Slider</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý slider
                </div>
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                @if(session('mess'))
                <div class="alert alert-success">{{session('mess')}}</div>
                @endif
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a class="btn btn-success" href="{{route('slider.create')}}">Thêm mới</a>
                        <a class="btn btn-primary" href="{{URL::to('/slider')}}">Tất cả</a>
                    </div>
                    <div class="col-sm-4">
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
                                <th>Tên slide</th>
                                <th>Nội dung</th>
                                <th>Hình ảnh</th>
                                <th style="width:30px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $key => $slider)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$key+1}}</td>
                                <td>{{$slider->name}}</td>
                                <td>{{$slider->content}}</td>
                                <td>
                                    <img src="{{ asset('upload/product/' . $slider->image) }}" height="100" width="300" />
                                </td>
                                <td>
                                    <a href="{{route('slider.delete',$slider->id)}}" onclick="return  confirm('Bạn có chắc chắn muốn xóa?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                                    <a href="{{route('slider.edit',$slider->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection