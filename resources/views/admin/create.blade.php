@extends('layouts.adminlayout')
@section('content')
	@include('partials._errors')

	<h1>Добавить Сайт</h1>
	{!! Form::open(array('url' => 'admin', 'files' => 'true', 'class' => 'create-form',)) !!}
	@include('partials.admin._form_create')
	{!! Form::close() !!}

@stop