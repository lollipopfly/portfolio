@extends('layouts.adminlayout')
@section('content')
    <h1>Обновить сайт</h1>
    {!! Form::open(array('method' => 'PATCH', 'files' => 'true', 'action' => ['AdminController@update', $work->id], 'class' => 'create-form',)) !!}
    <div class="form-group">
        {!! Form::label('title', 'Название', ['class' => 'create_form__label']) !!}
        {!! Form::text('title', $work->title , ['class' => 'create-form__input form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('overview', 'Описание', ['class' => 'create_form__label']) !!}
        {!! Form::textarea('overview', $work->overview, ['class' => 'create-form__input form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Добавить изображение', ['class' => 'create_form__label']) !!}
        {!! Form::file('image') !!}
        @if($work->image)
            <img src="{!! $work->image !!}" class="admin-form__img" />
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('platform', 'Платформа', ['class' => 'create_form__label']) !!}
        {!! Form::text('platform', $work->platform, ['class' => 'create-form__input form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Роль', ['class' => 'create_form__label']) !!}
        {!! Form::text('role', $work->role, ['class' => 'create-form__input form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('link', 'Ссылка', ['class' => 'create_form__label']) !!}
        {!! Form::text('link', $work->link, ['class' => 'create-form__input form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Теги', ['class' => 'create_form__label']) !!}
        {!! Form::text('tags', $work->tags, ['class' => 'create-form__input form-control']) !!}
    </div>

    {!! Form::submit('Создать', ['class' => 'create-form__submit btn btn-primary pull-right']) !!}
    {!! Form::close() !!}

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

@stop