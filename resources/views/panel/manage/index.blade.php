@extends('panel.fullLayout')

@section('content')
    <h1>Управление</h1>

    <ul>
        <li><a onclick="return postARequest(this);" href="{{ route('admin::manage::get', ['type'=>'regions'], false) }}"></a></li>
        <!--
        <li><a onclick="return postARequest(this);" href="{{ route('admin::manage::get', ['type'=>'regions'], false) }}">Получить и обновить регионы</a></li>
        <li><a onclick="return postARequest(this);" href="{{ route('admin::manage::get', ['type'=>'cities'], false) }}">Получить и обновить населённые пункты</a></li>
        <li><a onclick="return postARequest(this);" href="{{ route('admin::manage::get', ['type'=>'categories'], false) }}">Получить и обновить категории</a></li>
        -->
    </ul>
    <!--
    <div class="process-manager">
        @if(!empty($tasks) && $tasks->count())
            @foreach($tasks as $task)
                <div id="task{{ $task->id }}" class="item clearfix">
                    <h2>{{ $task->name }}</h2>
                    <div class="controls">
                        @include('panel.manage.task.controls')
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    -->
@endsection