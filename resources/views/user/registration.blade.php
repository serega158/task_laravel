@extends('base')

@section('body')

{{ Form::open(array('url' => '/registration')) }}

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name"
			   placeholder="name" value="{!! old('name') !!}">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email"
			   placeholder="example@gmail.com" value="{!! old('email') !!}">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password">
	</div>

	<div class="form-group">
		<label for="password_confirm">Confirm Password</label>
		<input type="password" class="form-control" name="password_confirm">
	</div>

	<button type="submit" class="btn btn-success">Sign up!</button>

{{ Form::close() }}

@stop