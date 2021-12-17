@extends('layouts.login')

@section('content')

<form action="/result" method="post">
{{ csrf_field() }}
<input type="text" name="search">
<input type= "image" class="search-p" src="{{ asset('images/search.png') }}">
</form>

@foreach($list as $list)
<tr>
     <div class="wrap-search">
          <div class="wrap-search-form">
            <td><img class="icon" src="images/{{$list->images}}"></td>
            <td><?php echo $list->username ; ?></td>
           </div>

      @if(!in_array($list->id,array_column($followUser,'follow')))
      <td>
          <div class="wrap-userlist-item">
           <form action="/follow" method="post">
           {{ csrf_field() }}
           <button type="submit" value="{{$list->id}}" name="follow">フォローする</button>
           </form>
          </div>
      </td>
     </div>
     @else
     <td>
          <div class="wrap-userlist-item">
           <form action="/unfollow" method="post">
           {{ csrf_field() }}
           <button type="submit" value="{{$list->id}}" name="unfollow">フォローをはずす</button>
           </form>
          </div>
     </td>
     @endif

</tr>

@endforeach



@endsection
