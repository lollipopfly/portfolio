<div class="form-group">
    {!! Form::label('title', 'Название', ['class' => 'create_form__label']) !!}
    {!! Form::text('title', $work->title , ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('overview', 'Описание', ['class' => 'create_form__label']) !!}
    {!! Form::textarea('overview', $work->overview, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sort', 'Сортировка', ['class' => 'create_form__label']) !!}
    {!! Form::text('sort', $work->sort, ['class' => 'create-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Добавить изображение', ['class' => 'create_form__label']) !!}
    {!! Form::file('image') !!}
    @if($work->image)
        <img src="{!! asset($work->image) !!}" class="admin-form__img" />
    @endif
</div>

<div class="form-group">
    {!! Form::label('display_image', 'Добавить изображение для дисплея', ['class' => 'create_form__label']) !!}
    {!! Form::file('display_image') !!}
    @if($work->display_image)
        <img src="{!! asset($work->display_image) !!}" class="admin-form__img" />
    @endif
</div>

<div class="form-group">
    {!! Form::label('tablet_image', 'Добавить изображение для Планшета', ['class' => 'create_form__label']) !!}
    {!! Form::file('tablet_image') !!}
    @if($work->tablet_image)
        <img src="{!! asset($work->tablet_image) !!}" class="admin-form__img" />
    @endif
</div>

<div class="form-group">
    {!! Form::label('phone_image', 'Добавить изображение для телефона', ['class' => 'create_form__label']) !!}
    {!! Form::file('phone_image') !!}
    @if($work->phone_image)
        <img src="{!! asset($work->phone_image) !!}" class="admin-form__img" />
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