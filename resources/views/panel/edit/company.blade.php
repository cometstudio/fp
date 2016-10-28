@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    @if(!empty($options['categories']))
        {{ count($options['categories']) }} root categories
    @endif
    <div class="row">
        @if(!empty($item->www))
            <dl><a href="{{ $item->www }}" target="_blank">Сайт</a></dl>
        @else
            <dl>Сайт</dl>
        @endif

        <input name="www" value="{{ $item->www }}" type="text" class="x2" />
    </div>
    <div class="row">
        <dl>E-mail</dl>
        <input name="email" value="{{ $item->email }}" type="text" class="x2" />
    </div>
    <div class="row">
        <dl>Телефоны</dl>
        <input name="phones" value="{{ $item->phones }}" type="text" />
    </div>
    <div class="row">
        <dl>Адрес</dl>
        <input name="address" value="{{ $item->address }}" type="text" />
    </div>
    <div class="row">
        <dl>Комментарии</dl>
        <textarea name="comments">{{ $item->comments }}</textarea>
    </div>
@endsection