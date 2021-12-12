@extends('layouts.login')

@section('content')

<form action="/create" method="post">
  {{ csrf_field() }}
  <input type="text" name="post">
  <input type="hidden" name="userid">
  <input type="image" src="images/post.png">

</form>

@foreach ($list as $list)
  <tr>
    <td><img src="{{asset('images/dawn.png')}}"></td>
    <td>{{$list->username}}</td>
    <td>{{$list->posts}}</td>
    <td>{{$list->created_at}}</td>
    <td>


@endforeach

@endsection
