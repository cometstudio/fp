<ul class="{{ \Pmanager::status($task->pid) ? 'hidden ' : '' }}off clearfix">
    <li>Бездействует. Предыдущий запуск был {{ \Date::getDateFromTime($task->started_at, 3) }}</li>
    <li><span class="fa fa-play-circle-o"></span> <a onclick="return manageProcess(this, '#task{{ $task->id }}');" href="{{ route('admin::manage::task::byId', ['id'=>$task->id, 'action'=>'start'], false) }}">Запустить</a></li>
</ul>
<ul class="{{ !(\Pmanager::status($task->pid)) ? 'hidden ' : '' }}on clearfix">
    <li><span class="fa fa-gear fa-spin"></span> Запущен {{ \Date::getDateFromTime($task->started_at, 3) }}, pID: {{ $task->pid }}</li>
    <li><span class="fa fa-hand-stop-o"></span> <a onclick="return manageProcess(this, '#task{{ $task->id }}');" href="{{ route('admin::manage::task::byId', ['id'=>$task->id, 'action'=>'stop'], false) }}">Остановить</a></li>
</ul>