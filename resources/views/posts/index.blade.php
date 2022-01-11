@extends('layouts.login')

@section('content')
<div class="post-box">
<form class="wrap-post" action="/create" method="post">
  <img class="wrap-post-icon" src="{{ asset('images/'.$images) }}">
  {{ csrf_field() }}
  <input class="wrap-post-form" type="text" name="post" placeholder="何をつぶやこうか…？">
  <input type="hidden" name="userid">
  <input class="wrap-post-form-btn" type="image" src="{{asset('images/post.png')}}">

</form>
</div>
@foreach ($list as $list)
<div class="post-list">
    <div class="post-top">
    <img class="list-icon" src="images/{{$list->images}}">
    <div class="list-name">{{$list->username}}</div>
    <div class="list-post">{{$list->post}}</div>
   </div>
    <div class="post-right">
    <div class="list-at">{{$list->created_at}}</div>

    @if ($list->user_id==Auth::id())
          <!-- モーダル編集ボタン -->
    <div class="modal-btn">
       <td class="edit_modal">
         <a href="" class="modalopen"  data-target="modal{{$list->id}}">
           <input type="image" class="edit-image" src="{{asset('images/edit.png')}}">
         </a>
       </td>
           <!-- モーダル削除ボタン -->
     <td class="delete-modal">
       <form action="/delete/{{ $list->id }}">
       <input type= "image" id="delete-image" src="{{asset('images/trash.png')}}" onClick="return Check()" onmouseover="hoge();" onmouseout="foo();" >
       </form>
     </td>
     </div>
     @endif
</div>
</div>
<!-- モーダルウィンドウ -->
<div class="modal-inner" id="modal{{$list->id}}">
   <div class="inner-content">
      <p class="inner-title">編集画面</p>
      <form method="post" action="/edit">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{ $list->id }}">
      <input type="text" class="edit_text" name="edit" value="{{$list->post}}">
      <input type= "image" src="{{asset('images/edit.png')}}">
      </form>
   </div>
 </div>

@endforeach

@endsection
