<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>title</title>
	@section('stylesheets')
		<link rel="stylesheet" href="{!! asset('css/nav.css') !!}">
		<link rel="stylesheet" href="{!! asset('css/base.css') !!}">
		<link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('css/adRecord.css') !!}">
	@show
	@section('js')
		<script src="{!! asset('js/jquery.min.js') !!}"></script>
	@show

</head>
<body>

@section('nav')
	<ul class="nav">
		<a href="{{ url('ads/list') }}"><li>list of all ads</li></a>
		@if (!session()->has('name'))
			<a href="{{ url('login') }}"><li<li>login</li></a>
			<a href="{{ url('registration') }}"><li<li>registration</li></a>
		@else
			<a href="{{ url('profile/ads/add') }}"><li>add ads</li></a>
			<a href="{{ url('profile/filters/control') }}"><li>add / edit filters</li></a>
			<a href="{{ url('ads/filtered/list') }}"><li>show filtered ads</li></a>
			<a id="logout-id" href="javascript:void()"><li>logout</li></a>
			<script>
				$(document).ready(function() {
					$("#logout-id").on("click", function () {
						$.ajax({
							type: "GET",
							url: "{{ url('logout') }}",
							success: function () {
								location.reload();
							}
						});
					});
				});
			</script>
		@endif
	</ul>
@show

<br>
@if (session()->has('name'))
<div class="center">
	Welcome {{ Session::get('name')}}!
</div>
@endif

<br>
<div class="center block blank">
	@section('alerts')
		@if ($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }}<br>
			@endforeach
		</div>
		@endif

		@if(Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message') }}
		</div>
		@endif
	@show

	@section('body')
		<h1>main page</h1>
	@show
</div>

</body>
</html>