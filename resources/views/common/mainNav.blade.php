<div class="main-nav section">
    <div class="wrapper clearfix">
        <div class="l">
            <a href="/">#фитнеспрактика</a>
        </div>

        <div class="social-links l">
            <span>в соцсетях:
                <a href="https://vk.com/fitnespraktika" title="ВКонтакте" class="fa fa-vk" target="_blank"></a>
                <a href="https://www.instagram.com/fitnespraktika" title="Instagram" class="fa fa-instagram" target="_blank"></a>
                <a href="https://www.youtube.com/channel/UCZIsiLeWkbynnERIgYIrYBg" title="YouTube" class="fa fa-youtube" target="_blank"></a>
                <a href="https://www.facebook.com/fitnespraktika" title="Facebook" class="fa fa-facebook-square" target="_blank"></a>
                <a href="https://telegram.me/fitnespraktika_bot" title="Telegram (бот)" class="fa fa-telegram" target="_blank"></a>
                <a href="http://chats.viber.com/fitnespraktika" title="Viber" class="fa fa-v" target="_blank"></a>
            </span>
        </div>

        <div class="r">
            <nav>
                <a href="/calendar">Календарь</a>
                <a href="/gallery">Фотоотчёты</a>
                <a href="/videos">Видеоотчёты</a>
                @if(!empty($currentUser))
                    <span><i class="fa fa-unlock"></i><a href="{{ route('logout', [], false) }}">Выйти</a></span>
                @else
                   <span><i class="fa fa-unlock"></i><a href="{{ route('login', [], false) }}">Войти</a></span>
                @endif

            </nav>
        </div>
    </div>
</div>