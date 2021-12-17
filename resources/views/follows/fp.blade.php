@extends('layouts.login')

@section('content')

<img src="{{asset('images/dawn.png')}}">
<P>Name {{$fp->username}}</P>
<P>Bio {{$fp->bio}}</P>

     @if(!in_array($fp->id,array_column($followUser,'follow')))
     <div>
          <form action="/follow" method="post">
          {{ csrf_field() }}
          <button type="submit" value="{{$fp->id}}" name="follow">フォローする</button>
          </form>
     </div>
     @else
     <div>
          <form action="/unfollow" method="post">
          {{ csrf_field() }}
          <button type="submit" value="{{$fp->id}}" name="unfollow">フォローをはずす</button>
          </form>
     </div>
     @endif

     <div>
<ul>
  @foreach($fpPost as $followpost)
  <li><img src="{{asset('images/'.$followpost->images)}}"></li>
  <li>{{$followpost->username}}</li>
  <li>{{$followpost->post}}</li>
  @endforeach
</ul>
     </div>

@endsection
