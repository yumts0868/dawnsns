@extends('layouts.login')

@section('content')
<div class="wrap-profile">
    <form action="/profile/update" method="post" class="form-group" enctype="multipart/form-data">
  <div class="form-name">
    <div class="wrap-profile-icon">
    <img src="images/{{$images}}">
    </div>
  {{ csrf_field() }}
  <p>UserName:</p><input type="text" class="form-profile" name=username value="{{ $user->username }}">
  @if($errors->has('username'))
<p>{{$errors->first('username')}}</p>
@endif
</div>
  <div class="form-mail">
  <p>Mailadress:</p><input type="text" class="form-profile" name=mail value="{{ $user->mail }}">
  @if($errors->has('mail'))
<p>{{$errors->first('mail')}}</p>
@endif
</div>
  <div class="form-pass">
 <p>Password:</p><input type="password" class="form-profile-pass" name=pass value="{{ $user->password }}" disabled>
 </div>
   <div class="form-newpass">
  <p>new password:</p><input type="password" class="form-profile-newpass" name=newpass >
  @if($errors->has('newpass'))
<p>{{$errors->first('newpass')}}</p>
@endif
  </div>
  <div class="form-bio">
  <p>Bio:</p><input type="text":; class="form-profile bio" name=bio value="{{ $user->bio }}">
  @if($errors->has('bio'))
<p>{{$errors->first('bio')}}</p>
@endif
</div>
  <div class="form-img">
  <p>Icon Image:</p><input type="file" class="form-profile" name=image value="{{ $user->images }}">
  @if($errors->has('images'))
<p>{{$errors->first('images')}}</p>
@endif
  </div>
  <input type='submit' class="btn btn-profile-edit" value='更新'>
  </form>
</div>


@endsection
