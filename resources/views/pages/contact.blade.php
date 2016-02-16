@extends('layouts.mainlayout')
@section('content')
    <div class="row contact">
       <div class="col-md-24">
           <div class="row contact-top">
               <div class="col-md-24">
                   <h2>Contact Me</h2>
                   <p>I am available for freelance work, or if you'd like to contact me for any other reason, please use the form below.</p>
               </div>
           </div>

           <div class="row contact-bottom">
               <div class="col-md-8 col-sm-8 hidden-xs">
                   <img src="{!! asset('images/bike.png') !!}" alt="">
               </div>

               <div class="col-md-16 col-sm-16">
                        @if(Session::get('flash_message'))
                            <div class="alert-success contact-success">{!! Session::get('flash_message') !!}</div>
                        @endif
                       @if($errors->any())
                           <ul class="error-list">
                               @foreach($errors->all() as $error)
                                   <li class="error-list__item">{{ $error }}</li>
                               @endforeach
                           </ul>
                       @endif

                   {!! Form::open(array('url' => 'sendemail/', 'class' => 'contact-form')) !!}
                       <div class="form-group">
                           {!! Form::label('name', 'Name', ['class' => 'contact-form__label']) !!}
                           {!! Form::text('name', null, ['class' => 'contact-form__imput form-control']) !!}
                       </div>

                       <div class="form-group">
                           {!! Form::label('email', 'Email', ['class' => 'contact-form__label']) !!}
                           {!! Form::email('email', null, ['class' => 'contact-form__imput form-control']) !!}
                       </div>

                       <div class="form-group">
                           {!! Form::label('message', 'Message', ['class' => 'contact-form__label']) !!}
                           {!! Form::textarea('message', null, ['class' => 'contact-form__textarea form-control']) !!}
                       </div>

                        {!! Form::submit('Contact me', ['class' => 'contact-form__submit btn btn-primary pull-right']) !!}
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@stop