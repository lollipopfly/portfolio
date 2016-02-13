<div class="form-group">
    {!! Form::label('title', 'Название', ['class' => 'create_form__label']) !!}
    {!! Form::text('title', null, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('overview', 'Описание', ['class' => 'create_form__label']) !!}
    {!! Form::textarea('overview', null, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Добавить изображение', ['class' => 'create_form__label']) !!}
    {!! Form::file('image') !!}
</div>

<div class="form-group">
    {!! Form::label('platform', 'Платформа', ['class' => 'create_form__label']) !!}
    {!! Form::text('platform', null, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role', 'Роль', ['class' => 'create_form__label']) !!}
    {!! Form::text('role', null, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Ссылка', ['class' => 'create_form__label']) !!}
    {!! Form::text('link', null, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tags', 'Теги', ['class' => 'create_form__label']) !!}
    {!! Form::text('tags', null, ['class' => 'create-form__input form-control']) !!}
</div>

{!! Form::submit('Создать', ['class' => 'create-form__submit btn btn-primary pull-right']) !!}