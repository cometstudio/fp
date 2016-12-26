@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    <div class="row">
        <dl>text</dl>
        <textarea name="text" class="ck">{{ $item->text }}</textarea>
    </div>
    <div class="row">
        <dl>notice</dl>
        <textarea name="notice" class="ck">{{ $item->notice }}</textarea>
    </div>
    <div class="row">
        <dl>Б/Ж/У/ККал</dl>
        <input name="protein" value="{{ $item->protein }}" type="text" style="width:23.5%;margin-right: 2%;" /><input name="fat" value="{{ $item->fat }}" type="text" style="width:23.5%;margin-right: 2%;" /><input name="carbohydrates" value="{{ $item->carbohydrates }}" type="text" style="width:23.5%;margin-right: 2%;" /><input name="calories" value="{{ $item->calories }}" type="text" style="width:23.5%;" />
    </div>
@endsection