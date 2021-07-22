@if($cate->childrent->count())
<ul>
    @foreach($cate -> childrent as $c)
    <li><a href="{{route('view',['id'=>$cate->id])}}">{{$c->name}}</a></li>
    @endforeach
</ul>
@endif