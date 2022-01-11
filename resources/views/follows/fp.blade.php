@extends('layouts.login')

@section('content')

<div class="wrap-user">
     <div class="wrap-user-left">
     <img class="user-icon" src="{{asset('images/'.$fp->images)}}">
     <div class="wrap-left-info">
     <div class="wrap-fp-name">
     <p class="name-title">Name</p><p class="user-name">{{$fp->username}}</p>
     </div>
     <div class="wrap-fp-bio">
     <P class="bio-title">Bio</p><p class="user-bio">{{$fp->bio}}</P>
     </div>
     </div>
     </div>

    <div class="wrap-user-right">
     @if(!in_array($fp->id,array_column($followUser,'follow')))
     <div>
          <form action="/follow" method="post">
          {{ csrf_field() }}
          <button type="submit" class="btn-follow" value="{{$fp->id}}" name="follow">フォローする</button>
          </form>
     </div>
     @else
     <div>
          <form action="/unfollow" method="post">
          {{ csrf_field() }}
          <button type="submit" class="btn-unfollow" value="{{$fp->id}}" name="unfollow">フォローをはずす</button>
          </form>
     </div>
     @endif
     </div>
</div>
     <div class="post-list">
<ul>
  @foreach($fpPost as $followpost)
  <li class="list-icon"><img src="{{asset('images/'.$followpost->images)}}"></li>
  <li class="list-name">{{$followpost->username}}</li>
  <li class="list-post">{{$followpost->post}}</li>
  <li class="list-at">{{$followpost->created_at}}</li>
  @endforeach
</ul>
     </div>

@endsection
