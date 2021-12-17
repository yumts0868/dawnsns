@extends('layouts.login')

@section('content')
<p>Follow @livewireStyles</p>
<ul>
  @foreach($follow as $followList)
  <li><a href="/fp/{{$followList->id}}"><img src="images/{{$followList->images}}"></a></li>
  <li>{{$followList->username}}</li>
  @endforeach
</ul>
<ul>
  @foreach($followpost as $followpost)
  <li><img src="images/{{$followpost->images}}"></li>
  <li>{{$followpost->username}}</li>
  <li>{{$followpost->post}}</li>
  <li>{{$followpost->created_at}}</li>
  @endforeach
</ul>

@endsection
