@extends('base')

@section('body')

<div id="open-form-add-id" class="button">
	Add new filter
</div>
<div id="form-add-id">
	{{ Form::open(array('url' => '/profile/filters/add')) }}

	<div class="form-group">
		<label for="name">brand_car_name</label>
		<input type="text" class="form-control" name="brand_car_name"
			   placeholder="brand_car_name" value="{!! old('brand_car_name') !!}">

		<label for="name">model_name</label>
		<input type="text" class="form-control" name="model_name"
			   placeholder="model_name" value="{!! old('model_name') !!}">

		<label for="name">year_issue</label>
		<input type="text" class="form-control" name="year_issue"
			   placeholder="year_issue" value="{!! old('year_issue') !!}">

		<label for="name">mileage</label>
		<input type="text" class="form-control" name="mileage"
			   placeholder="mileage" value="{!! old('mileage') !!}">

		<label for="name">price</label>
		<input type="text" class="form-control" name="price"
			   placeholder="price" value="{!! old('price') !!}">

		<label for="name">is active</label>
		{{ Form::checkbox('active', 'yes') }}
	</div>

	<button type="submit" class="btn btn-success">Add filter!</button>

	{{ Form::close() }}
</div>
@include('formHelper')

You have {{ count($filters) }} filters

@foreach ($filters as $filter)
<div class='adRecord-unit'>
	<div class="clear">
		<div class='adRecord-title'>
			year_issue: {{ $filter->year_issue }};
			mileage: {{ $filter->mileage }};
			price: {{ $filter->price }};
			brand_car_name: <b>{{ $filter->brand_car_name }}</b>,
			model_name: <b>{{ $filter->model_name }}</b>
			&nbsp;
			{{ Form::checkbox('filterCheck', null, $filter->active,
				array('id' => $filter->id)) }}
		</div>
	</div>

</div>
@endforeach

@stop