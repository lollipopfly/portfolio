@extends('layouts.adminlayout')
@section('content')
	@if(isset($works))
		<ul class="recent">
			@foreach($works as $work)
				<li class="recent__item">
					<a href="/admin/{{ $work->id }}/edit" class="recent__link">{!! $work->title !!}</a>
					{!! Form::open(array('method' => 'DELETE', 'action' => ['AdminController@destroy', $work->id])) !!}
                        {!! Form::button('', ['class' => "recent__del fa fa-times", 'type' => 'submit']) !!}
                    {!! Form::close() !!}
				</li>
			@endforeach
		</ul>
		{{-- PAGINATION --}}
		{!! $works->render() !!}
	@endif
@stop