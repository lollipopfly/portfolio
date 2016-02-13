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
        <img src="{!! asset($work->image) !!}" class="admin-form__img" />
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

{!! Form::submit('Обновить', ['class' => 'create-form__submit btn btn-primary pull-right']) !!}