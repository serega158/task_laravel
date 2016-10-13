@extends('base')

@section('body')

@if (session()->has('id'))

<div id="open-form-add-id" class="button">
	Add new ad
</div>
<div id="form-add-id">
	{{ Form::open(array('url' => '/profile/ads/add')) }}

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

		<label for="name">description</label>
		<input type="text" class="form-control" name="description"
			   placeholder="description" value="{!! old('description') !!}">
	</div>

	<button type="submit" class="btn btn-success">Add ad!</button>

	{{ Form::close() }}
</div>
@include('formHelper')

@endif

Found {{ count($ads) }} results

@foreach ($ads as $ad)
	<div class='adRecord-unit'>
		<div class="clear">
			<div class='adRecord-title'>
				year_issue: {{ $ad->year_issue }};
				mileage: {{ $ad->mileage }};
				price: {{ $ad->price }};
			</div>
			<div class='adRecord-title-right'>
				by user: {{ $ad->user->name }}
			</div>
		</div>

		<h4 class='center'>
			brand_car_name: <b>{{ $ad->brand_car_name }}</b>,
			model_name: <b>{{ $ad->model_name }}</b>
		</h4>

		<div class='adRecord-record'>
			{{ $ad->description }}
		</div>
	</div>
@endforeach

@stop