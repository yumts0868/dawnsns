@extends('layouts.login')

@section('content')

<div class="followlist-box">
<p class="follow-title">Follow List</p>
<ul class="follow-list">
  @foreach($follow as $followList)
  <li><a href="/fp/{{$followList->id}}"><img class="followlist-icon" src="images/{{$followList->images}}"></a></li>
  @endforeach
</ul>
</div>

<div class="post-list">
<ul>
  @foreach($followpost as $followpost)
  <li><a href="/fp/{{$followList->id}}"><img class="list-icon" src="images/{{$followpost->images}}"></a></li>
  <li class="list-name">{{$followpost->username}}</li>
  <li class="list-post">{{$followpost->post}}</li>
  <li class="list-at">{{$followpost->created_at}}</li>
  @endforeach
</ul>
</div>

@endsection
