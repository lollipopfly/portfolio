@extends('layouts.adminlayout')
@section('content')
	{!! Form::open(array('url' => 'admin', 'files' => 'true', 'class' => 'create-form',)) !!}
		<div class="form-group">
		    {!! Form::label('title', 'Название', ['class' => 'create_form__label']) !!}
		    {!! Form::text('title', null, ['class' => 'create-form__input form-control']) !!}
		</div>

	{{-- 	<div class="form-group">
		    {!! Form::label('detail_image', 'Главное фото', ['class' => 'create_form__label']) !!}
		    {!! Form::file('detail_image', null) !!}
		</div> --}}

		<div class="form-group">
		    {!! Form::label('overiview', 'Описание', ['class' => 'create_form__label']) !!}
		    {!! Form::textarea('overiview', null, ['class' => 'create-form__input form-control']) !!}
		</div>

		{!! Form::submit('Создать', ['class' => 'create-form__submit btn btn-primary pull-right']) !!}
    {!! Form::close() !!}

@stop