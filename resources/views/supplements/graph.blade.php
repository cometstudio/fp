@extends('master')

@section('content')
       <div class="content-wrapper">
        <div class="s0 section">
            <div class="wrapper">
                <h1>{{ $misc->name or 'Header' }}</h1>

                <form action="{{ route('supplements:graph', [], false) }}" method="get">
                    <input name="date" class="datepicker" value="{{ Date::getDateFromTime($startAt, 1) }}" onchange="this.form.submit();" type="text" style="width: auto;" />
                    <select name="type">
                        <option value="protein"{{ request()->get('type') == 'protein' ? ' selected' : '' }}>Белки</option>
                        <option value="fat"{{ request()->get('type') == 'fat' ? ' selected' : '' }}>Жиры</option>
                        <option value="carbohydrates"{{ request()->get('type') == 'carbohydrates' ? ' selected' : '' }}>Углеводы</option>
                        <option value="energy"{{ request()->get('type') == 'energy' || !request()->has('type')  ? ' selected' : '' }}>Энергия</option>
                    </select> <button class="button">Показать</button>
                </form>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="s1 section">
            <div class="wrapper">
                <div class="supplements-graph">
                    Maксимально в сутки ({{ $maxValue }})
                    <div class="graph">
                        <div class="row clearfix">
                            @foreach($graphData as $day)
                                <div class="column">
                                    <div class="daily-value marker" style="height: {{ $day[$type.'_daily']['value'] * 100 / $maxValue }}%;">
                                        <div class="{{ $day[$type.'_daily']['active'] ? 'active ' : '' }}total marker" style="height: {{ $day[$type.'_daily']['total'] }}%;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row clearfix">
                        @foreach($graphData as $day)
                            <div class="column">
                                {{ \Date::getDateFromTime($day['calendar']->start_at, 2) }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection