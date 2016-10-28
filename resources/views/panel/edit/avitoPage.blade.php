@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>URL</dl>
        <input name="url" value="{{ $item->url }}" type="text" />
    </div>
    <div class="row">
        <dl>Название (допустимо не указывать)</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
@endsection