@extends('layouts.login')

@section('content')
<div class="search-box">
<form class="wrap-search" action="/result" method="post">
{{ csrf_field() }}
<input type="text" class="form-search" name="search" placeholder="ユーザー名">
<input type= "image" class="search-p" src="{{ asset('images/search.png') }}">
</form>

@if(isset($word))
<p class="search-word">検索ワード:{{ $word }}</p>
@else
@endif

</div>

@foreach($list as $list)
     <div class="wrap-userlist">
          <div class="wrap-userlist-item">
            <td><img class="icon" src="images/{{$list->images}}"></td>
            <p class="list-name">{{ $list->username }}</p>
           </div>

      @if(!in_array($list->id,array_column($followUser,'follow'))) {{-- in_array関数を使い、配列内に指定した要素（フォローカラムにユーザーid）が入っていないかチェックして表示 --}}
      <td>
          <div class="wrap-userlist-item">
           <form action="/follow" method="post">
           {{ csrf_field() }}
           <button type="submit" class="btn-follow" value="{{$list->id}}" name="follow">フォローする</button>
           </form>
          </div>
      </td>
     </div>
     @else
     <td>
          <div class="wrap-userlist-item">
           <form action="/unfollow" method="post">
           {{ csrf_field() }}
           <button type="submit" class="btn-unfollow" value="{{$list->id}}" name="unfollow">フォローをはずす</button>
           </form>
          </div>
     </td>
     </div>
     @endif

@endforeach



@endsection
