@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="content-wrapper">
        <div class="s0 section">
            <div class="wrapper">
                <h1>My</h1>
                <div class="login form grid">
                    <form action="">
                        <div class="x2 row clearfix">
                            <div class="column">
                                <div id="name" class="hidden row">
                                   <div class="label">Имя</div>
                                    <input name="name" type="text" />
                                </div>
                                <div class="row">
                                   <div class="label clearfix">
                                       E-mail
                                   </div>
                                    <input name="email" type="text" />
                                </div>
                                <div class="row">
                                   <div class="label">Пароль</div>
                                    <i class="fa fa-eye-slash" onclick="$(this).parent().find('input').prop('type', 'text');$(this).removeClass('fa-eye-slash').addClass('fa-eye');"></i>
                                    <input name="password" type="password" />
                                </div>
                                <div class="row">
                                   <div class="label">Profile photo</div>
                                    <input name="_picture" onchange="uploadProfilePicture();" type="file" />
                                    <a onclick="$('input[name=_picture]').click();" href="javascript:void(0);" class="empty pair button" style="float: left; margin-right: 3px;">Choose a file...</a> <img id="profile-picture" src="/images/thumbs/{{ $currentUser->getThumbnail() }}.jpg" style="height: 46px;" />
                                </div>
                                <div class="row">
                                   <button onclick="return false;">Save</button>
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