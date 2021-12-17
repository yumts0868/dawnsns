@extends('layouts.login')

@section('content')
<div class="wrap-profile">
    <form action="/profile/update" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  Username:<input type="text" name=newname value="{{ $user->username }}"><br><br>
  Mailadress:<input type="text" name=newmail value="{{ $user->mail }}"><br><br>
  Password:{{ $user->password }}<br><br>
  new password:<input type="text" name=newpass ><br><br>
  Bio:<textarea type="text" name=newbio>{{ $user->bio }}</textarea><br><br>
  Icon Image:<input type="file" name=image><br><br>
  <input type='submit' class="btn btn-profile-edit" value='更新'>
  </form>
</div>


@endsection
