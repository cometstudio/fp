@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    <div class="row">
        <dl>E-mail</dl>
        <input name="email" value="{{ $item->email }}" type="text" />
    </div>
    <div class="row">
        <dl>Title главной</dl>
        <input name="main_page_title" value="{{ $item->main_page_title }}" type="text" />
    </div>
    <div class="row">
        <dl>Title-постфикс</dl>
        <input name="title" value="{{ $item->title }}" type="text" />
    </div>
    <div class="row">
        <dl>Счётчик посещаемости</dl>
        <textarea name="counter">{{ $item->counter }}</textarea>
    </div>
    <div class="row">
        <dl>Дата начала сезона</dl>
        <input name="_start_at" value="{{ $item->getStartDate() }}" type="text" class="x4 datepicker" autocomplete="off" />
    </div>
@endsection