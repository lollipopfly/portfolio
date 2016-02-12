<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/admin.css">
</head>
<body>
	<div class="container">
		<header class="row">
			<div class="col-md-12">
				<h2>
					<a href="/admin" class="logo">Portfolio</a>
				</h2>
			</div>

		</header>
	</div>

	<div class="container">
		<div class="row">
			<aside class="col-md-3">
				<div class="list-group">
				  <a class="list-group-item" href="/admin/"><i class="fa fa-book fa-list"></i>&nbsp; Список всех работ</a>
				  <a class="list-group-item list-group__blue" href="/admin/create/"><i class="fa fa-home fa-plus"></i>&nbsp; Добавить работу</a>
				</div>
			</aside>
			<div class="main col-md-9">
				{{-- @include('partials.admin.flash') --}}
				@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				        {!! Session::get('flash_message') !!}
				    </div>
				@endif
				@yield('content')
			</div>
		</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
