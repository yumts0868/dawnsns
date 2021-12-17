@extends('layouts.login')

@section('content')
<p>Follower list</p>
<ul>
  @foreach($follower as $followerList)
  <li><a href="/fp/{{$followerList->id}}"><img src="images/{{$followerList->images}}"></a></li>
  <li>{{$followerList->username}}</li>
  @endforeach
</ul>
<ul>
  @foreach($followerpost as $followerpost)
  <li><img src="images/{{$followerpost->images}}"></li>
  <li>{{$followerpost->username}}</li>
  <li>{{$followerpost->post}}</li>
  <li>{{$followerpost->created_at}}</li>

  @endforeach
</ul>

@endsection
