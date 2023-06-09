@extends('main')
@section('title')
	Đăng nhập
@endsection

@section('content')
<form method='post' action='{{Asset('login')}}' id='form-login'>
	@if(Session::has('register_success'))
	{{Session::get('register_success')}}
	<?php Session::forget('register_success');?>
	@endif
	<h2>Login</h2>
	<input type ='text' name='user_input' id='user_input' placeholder='Username or email' class='form-control'/>
	<input type ='password' name='password' id='password'  placeholder='Password'  class='form-control'/>
	@if(isset($error_message))
	<label class='error'>{{$error_message}}</label>
	@endif
	<button id="dangNhap" class='btn btn-lg btn-primary btn-block'>Login</button>
</form>

@endsection