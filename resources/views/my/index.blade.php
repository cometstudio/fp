@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="content-wrapper">
        <div class="s0 section">
            <div class="wrapper">
                <h1>Персональные данные</h1>
                <div class="profile form grid">
                    <form action="{{ route('my:save', [], false) }}" method="post" enctype="multipart/form-data">
                        <div class="x2 row clearfix">
                            <div class="column">
                                <div id="name" class="row">
                                   <div class="label">Имя</div>
                                    <input name="name" value="{{ $currentUser->name }}" type="text" />
                                </div>
                                <div class="row">
                                   <div class="label clearfix">
                                       E-mail
                                   </div>
                                    <input name="email" value="{{ $currentUser->email }}" type="text" />
                                </div>
                                <div class="row">
                                   <div class="label">Пароль</div>
                                    <i class="fa fa-eye-slash" onclick="$(this).parent().find('input').prop('type', 'text');$(this).removeClass('fa-eye-slash').addClass('fa-eye');"></i>
                                    <input name="_password" value="" type="password" autocomplete="off" />
                                </div>
                                <div class="row clearfix">
                                   <div class="label">Фото</div>
                                    <input name="_picture" onchange="saveProfile();" type="file" />
                                    <a onclick="$('input[name=_picture]').click();" href="javascript:void(0);" class="empty pair button" style="float: left; margin-right: 3px;">Выберите файл изображения...</a> <span id="profile-picture"{!! empty($currentUser->gallery) ? ' class="hidden"' : '' !!}><img class="profile-picture-img" src="/images/thumbs/{{ $currentUser->getThumbnail() }}.jpg" style="float: left; margin-right: 3px; height: 46px;" /> <a href="{{ route('my:unlinkPicture', [], false) }}" onclick="return unlinkProfilePicture(this);" class="pair button">Удалить</a></span>
                                </div>
                                <div class="row">
                                   <button onclick="return saveProfile();" class="button">Сохранить</button>
                                </div>
                            </div>
                            <div class="column" style="padding-top: 61px;"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection