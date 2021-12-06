@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))
<p>{{$errors->first('username')}}</p>
@endif

{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))
<p>{{$errors->first('mail')}}</p>
@endif

{{ Form::label('Password') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if($errors->has('password'))
<p>{{$errors->first('password')}}</p>
@endif

{{ Form::label('password_confirmation') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
@if($errors->has('password_confirmation'))
<p>{{$errors->first('password_confirmation')}}</p>
@endif

{{ Form::submit('Register') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
