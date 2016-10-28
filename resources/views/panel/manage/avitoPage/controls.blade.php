<ul class="{{ \Pmanager::status($avitoPage->pid) ? 'hidden ' : '' }}off clearfix">
    <li>Бездействует. Предыдущий запуск был {{ \Date::getDateFromTime($avitoPage->started_at, 3) }}</li>
    <li><span class="fa fa-play-circle-o"></span> <a onclick="return manageProcess(this, '#task{{ $avitoPage->id }}');" href="{{ route('admin::manage::task::byId', ['id'=>$avitoPage->id, 'action'=>'start'], false) }}">Запустить</a></li>
</ul>
<ul class="{{ !(\Pmanager::status($avitoPage->pid)) ? 'hidden ' : '' }}on clearfix">
    <li><span class="fa fa-gear fa-spin"></span> Запущен {{ \Date::getDateFromTime($avitoPage->started_at, 3) }}, pID: {{ $avitoPage->pid }}</li>
    <li><span class="fa fa-hand-stop-o"></span> <a onclick="return manageProcess(this, '#task{{ $avitoPage->id }}');" href="{{ route('admin::manage::task::byId', ['id'=>$avitoPage->id, 'action'=>'stop'], false) }}">Остановить</a></li>
</ul>