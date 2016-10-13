@extends('base')

@section('body')

{{ Form::open(array('url' => '/login')) }}

<div class="form-group">
	<label for="name">Name</label>
	<input type="text" class="form-control" name="name"
		   placeholder="name" value="{!! old('name') !!}">
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password">
</div>


<button type="submit" class="btn btn-success">Sign in!</button>

{{ Form::close() }}

@stop