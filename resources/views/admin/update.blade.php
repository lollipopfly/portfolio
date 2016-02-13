@extends('layouts.adminlayout')
@section('content')
    <h1>Обновить сайт</h1>
    @include('partials._errors')

    {!! Form::open(array('method' => 'PATCH', 'files' => 'true', 'action' => ['AdminController@update', $work->id], 'class' => 'create-form',)) !!}
    @include('partials.admin._form_update')
    {!! Form::close() !!}


@stop