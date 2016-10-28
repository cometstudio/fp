@extends('panel.fullLayout')

@section('content')
    <h1>Статистика по proxy</h1>

    <ul>
        <li>Всего proxy: <b>{{ $proxy->total }}</b></li>
    </ul>

    <div class="progress-bar">
        <div class="progress">
            <div class="bar" style="width: {{ $proxy->successful_tries_percents }}%;"></div>
        </div>
        <div class="info">Успешных попыток получить контент: <b>{{ $proxy->successful_tries_percents }}%</b> (<b>{{ $proxy->successful_tries }}</b> из <b>{{ $proxy->tries }}</b>)</div>
    </div>
@endsection