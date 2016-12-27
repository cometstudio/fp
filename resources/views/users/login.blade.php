@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="content-wrapper">
        <div class="s0 section">
            <div class="wrapper">
                <h1>Войти на сайт</h1>
                <div class="login form grid">
                    <form action="{{ route('login', [], false) }}">
                        <div class="x2 row clearfix">
                            <div class="column">
                                <div class="row">
                                   <label><input name="" type="checkbox" value="1" onclick="$('#name').toggle(); $('#forgotten').toggle();" /> я здесь впервые, зарегистрируйте меня</label>
                                </div>
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
                                   <div class="label">Пароль <a href="" id="forgotten" style="float: right;">Не помню пароль</a></div>
                                    <i class="fa fa-eye-slash" onclick="$(this).parent().find('input').prop('type', 'text');$(this).removeClass('fa-eye-slash').addClass('fa-eye');"></i>
                                    <input name="password" type="password" />
                                </div>
                                <div class="row">
                                   <button onclick="return login();">Войти</button>
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