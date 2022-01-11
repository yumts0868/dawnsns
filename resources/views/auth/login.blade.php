@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>DAWNのSNSへようこそ</p>
<div class="login-box">

  <div class="login-mail">
{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div class="login-pass">
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</div>

<div class="login-btn">
{{ Form::submit('LOGIN') }}
</div>
</div>

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
