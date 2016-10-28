@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    <div class="row">
        <dl>Текст</dl>
        <textarea name="text" class="ck">{{ $item->text }}</textarea>
    </div>
    <div class="row">
        <dl>Title</dl>
        <input name="title" value="{{ $item->title }}" type="text" />
    </div>
    <div class="row">
        <dl>Meta Keywords</dl>
        <input name="meta_keywords" value="{{ $item->meta_keywords }}" type="text" />
    </div>
    <div class="row">
        <dl>Meta Description</dl>
        <input name="meta_description" value="{{ $item->meta_description }}" type="text" />
    </div>
    <div class="row">
        <dl>Код (видеоплеера или любой другой)</dl>
        <textarea name="raw">{{ $item->raw }}</textarea>
    </div>
@endsection