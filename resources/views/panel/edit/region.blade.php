@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    <div class="row">
        <dl>URL</dl>
        <input name="url" value="{{ $item->url }}" type="text" class="x2" />
    </div>
    <div class="row">
        <dl>ID</dl>
        <input name="remote_id" value="{{ $item->remote_id }}" type="text" class="x2" />
    </div>
@endsection