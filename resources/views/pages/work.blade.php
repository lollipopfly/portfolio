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

            <div class="overview">
                <p class="work__overview">{!! $work->overview !!}</p>

                @if($work->platform === 'responsive')
                    <div class="work-image-container work-image-container--responsive">
                        <div class="work-display">
                            <div class="wrapper">
                                <img src="{!! asset($work->display_image) !!}"  class="work__img">
                            </div>
                        </div>
                        @if($work->tablet_image)
                            <div class="work-tablet">
                                <div class="wrapper">
                                    <img src="{!! asset($work->tablet_image) !!}"  class="work__img">
                                </div>
                            </div>
                        @endif
                        @if($work->phone_image)
                            <div class="work-phone">
                                <div class="wrapper">
                                    <img src="{!! asset($work->phone_image) !!}"  class="work__img">
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                @if($work->platform === 'display')
                    <div class="work-image-container">
                        <div class="work-display">
                            <div class="wrapper">
                                <img src="{!! asset($work->display_image) !!}"  class="work__img">
                            </div>
                        </div>
                    </div>
                @endif
                <img src="{!! asset($work->display_image) !!}" alt="" class="hidden-image">
            </div>

            @if($tags)
                <div class="tags">
                    <h3 class="tags__title">I use for this project:</h3>
                    <ul class="tags-list">
                        @foreach($tags as $tag)
                            <li class="tags-list__item">{!! $tag !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@stop