@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <!-- begin col-md-24  -->
        <div class="col-md-24">
            <h1 class="job-title">
                <span class="job-title__top fadeInRight">Full-stack</span>
                <span class="job-title__bottom fadeInLeft">Web Developer</span>
            </h1>
        </div>
        <!-- end  col-md-24 -->
    </div>

    <div class="row">
        <!-- begin recent col-md-24  -->
        <div class="recent col-md-24">
            <div class="row">
                <h2>my portfolio</h2>
            </div>
            @if($recent)
                <div class="row">
                    @foreach($recent as $value)
                        <div class="recent__item col-md-8 col-sm-8 col-xs-12">
                            <a href="/work/{!! $value->id !!}">
                                <img src="{!! $value->image !!}">
                            </a>
                        </div>
                    @endforeach
                </div>
                @endif
        </div>
        <!-- end recent col-md-24 -->
    </div>
@stop