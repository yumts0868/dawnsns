@extends('layouts.login')

@section('content')

<div class="followlist-box">
<p class="follow-title">Follower list</p>
<ul class="follow-list">
  @foreach($follower as $followerList)
  <li><a href="/fp/{{$followerList->id}}"><img class="followlist-icon"  src="images/{{$followerList->images}}"></a></li>
  @endforeach
</ul>
</div>

<div class="post-list">
<ul>
  @foreach($followerpost as $followerpost)
  <li><a href="/fp/{{$followerList->id}}"><img class="list-icon" src="images/{{$followerpost->images}}"></a></li>
  <li class="list-name">{{$followerpost->username}}</li>
  <li class="list-post">{{$followerpost->post}}</li>
  <li class="list-at">{{$followerpost->created_at}}</li>
  @endforeach
</ul>
</div>

@endsection
