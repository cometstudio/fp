<div class="main-nav section">
    <div class="wrapper clearfix">
        <div class="l">
            <span><a href="{{ route('index', [], false) }}">Index</a></span>
        </div>

        <div class="social-links l">
            <span>в соцсетях:
                <a href="https://vk.com/fitnespraktika" title="ВКонтакте" class="fa fa-vk" target="_blank"></a>
                <a href="https://www.instagram.com/fitnespraktika" title="Instagram" class="fa fa-instagram" target="_blank"></a>
                <a href="https://www.youtube.com/channel/UCZIsiLeWkbynnERIgYIrYBg" title="YouTube" class="fa fa-youtube" target="_blank"></a>
                <a href="https://www.facebook.com/fitnespraktika" title="Facebook" class="fa fa-facebook-square" target="_blank"></a>
                <a href="https://telegram.me/fitnespraktika_bot" title="Telegram (бот)" class="fa fa-telegram" target="_blank"></a>
                <!--<a href="http://chats.viber.com/fitnespraktika" title="Viber" class="fa fa-v" target="_blank"></a>-->
            </span>
        </div>

        <div class="r">
            <nav>
                <span><a href="/calendar">Календарь</a></span>
                <span><a href="/videos">Видеоотчёты</a></span>
                <span><a href="/gallery">Фотоотчёты</a></span>
                @if(!empty($currentUser))
                    <span><a href="{{ route('logout', [], false) }}">Выйти</a> <a href="{{ route('my:index', [], false) }}"><img class="profile-picture-img" src="/images/thumbs/{{ $currentUser->getThumbnail() }}.jpg" title="Редактировать персональные данные" style="height: 30px; margin-left: 5px;border-radius: 15px;" /></a></span>
                @else
                   <span><i class="fa fa-unlock"></i><a href="{{ route('login', [], false) }}" rel="nofollow">Войти</a></span>
                @endif
            </nav>
        </div>
    </div>
</div>