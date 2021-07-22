@extends('admin.dashboard')

@section('title')
<title>Thuộc tính</title>
@endsection

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tất cả thuộc tính
                </div>
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a class="btn btn-success" href="{{route('attribute.create')}}">Thêm mới</a>
                        <a class="btn btn-primary" href="{{URL::to('/attribute')}}">Tất cả</a>
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
                                <th>Thuộc tính</th>
                                <th>Giá trị thuộc tính</th>
                                <th style="width:30px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attributes as $key => $attr)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$key+1}}</td>
                                <td>{{$attr->name}}</td>
                                <td>{{$attr->value}}</td>
                                <td>
                                    <a href="{{route('attribute.delete',$attr->id)}}" onclick="return  confirm('Bạn có chắc chắn muốn xóa?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-7 text-right text-center-xs">
                            {{$attributes->appends(request()->all())->links()}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection