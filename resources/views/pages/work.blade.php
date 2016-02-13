@extends('layouts.mainlayout')
@section('content')
    <div class="row work">
        <div class="col-md-24">
            <h2 class="work__title fadeInLeft">{!! $work->title !!}</h2>
            <ul class="work-list">
                <li class="work__role">{!! $work->role !!}</li>
                <li class="work__platform">Platforms: <span class="work__platform--title">{!! $work->platform !!}</span></li>
                <li class="work__link">
                    <a href="http://{!! $work->link !!}" target="_blank">{!! $work->link !!}</a>
                </li>
            </ul>
            <p class="work__overview">{!! $work->overview !!}</p>
            <div class="work-image-container">
                <img src="{!! $work->image !!}"  class="work__img">
            </div>

            <div class="tags">
                <h3 class="tags__title">I use for this project:</h3>
                @if($tags)
                    <ul class="tags-list">
                        @foreach($tags as $tag)
                            <li class="tags-list__item">{!! $tag !!}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@stop