<?php $totalQueued = $item->queueCount(); ?>
<?php $totalParsed = $item->parsedQueueCount(); ?>

<div class="controls">
    <div class="{{ $item->started_at ? 'off' : 'on' }}">
        <ul class="clearfix">
            <li><span class="fa fa-play-circle-o"></span> <a onclick="return manageProcess(this, '#task{{ $item->id }}');" href="{{ route('admin::manage::task::byId', ['id'=>$item->id, 'action'=>'start'], false) }}">Поставить в очередь</a></li>
        </ul>
    </div>
    <div class="{{ !$item->started_at ? 'off' : 'on' }}">
        <ul class="clearfix">
            <li>Поставлено очередь {{ \Date::getDateFromTime($item->started_at, 3) }}</li>
            <li><span class="fa fa-play-circle-o"></span> <a onclick="return manageProcess(this, '#task{{ $item->id }}');" href="{{ route('admin::manage::task::byId', ['id'=>$item->id, 'action'=>'drop'], false) }}">Изъять из очереди</a></li>
        </ul>
        <div class="progress-bar">
            <div class="progress">
                <div class="bar" style="width: {{ $item->queueParsedPercents($totalQueued, $totalParsed) }}%;"></div>
            </div>
            <div class="info">Прогресс: {{ $item->queueParsedPercents($totalQueued, $totalParsed) }}% ({{ $totalParsed }} {{ \Dictionary::get('pages', $totalParsed) }} из {{ $totalQueued }})</div>
        </div>
    </div>
</div>