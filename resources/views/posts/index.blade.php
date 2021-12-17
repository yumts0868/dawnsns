@extends('layouts.login')

@section('content')

<form class="wrap-post" action="/create" method="post">
  <img class="wrap-post-icon" src="images/dawn.png">
  {{ csrf_field() }}
  <input class="wrap-post-form" type="text" name="post" placeholder="何をつぶやこうか…？">
  <input type="hidden" name="userid">
  <input class="wrap-post-form-btn" type="image" src="{{asset('images/post.png')}}">

</form>

@foreach ($list as $list)
  <tr>
    <td><img src="{{asset('images/dawn.png')}}"></td>
    <td>{{$list->username}}</td>
    <td>{{$list->post}}</td>
    <td>{{$list->created_at}}</td>
          <!-- モーダル編集ボタン -->
    <td>
       <div class="edit_modal">
         <a href="" class="modalopen"  data-target="modal{{$list->id}}">
           <input type="image" src="{{asset('images/edit.png')}}">
         </a>
       </div>
     </td>
           <!-- モーダル削除ボタン -->
     <td class="delete-modal">
       <form  method="post" action="/delete/{{ $list->id }}">
       <input type= "image" id="pic" src="{{asset('images/trash.png')}}" onClick="return Check()" onmouseover="hoge();" onmouseout="foo();" >
     </td>
</tr>
<!-- モーダルウィンドウ -->
<div class="modal-inner" id="modal{{$list->id}}">
   <div class="inner-content">
      <p class="inner-title">編集画面</p>
      <form method="post" action="/edit/{{$list->id}}">
      {{csrf_field()}}
      <input type="text" name="edit" value="{{$list->post}}">
      <input type= "image" src="{{asset('images/edit.png')}}">
      </form>
   </div>
 </div>

@endforeach

@endsection
