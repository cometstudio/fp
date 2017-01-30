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
    <div class="row">
        <a href="https://www.instagram.com/oauth/authorize/?client_id={{ env('INSTAGRAM_CLIENT_ID') }}&redirect_uri={{ route('instagram:auth') }}&response_type=code&scope=basic+public_content+follower_list+comments+relationships+likes">Получить Instagram access token</a>
    </div>

    <div class="row">
        <dl>Instagram access token</dl>
        <input name="instagram_access_token" value="{{ $item->instagram_access_token }}" type="text" />
    </div>
@endsection