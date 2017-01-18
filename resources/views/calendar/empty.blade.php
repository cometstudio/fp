@extends('master')

@section('content')

    <div class="content-wrapper">
        <div class="s0 section">
            <div class="wrapper">
                <h1>Календарь</h1>
            </div>
        </div>

        <div class="s1 section">
            <div class="wrapper">
                <div class="grid">
                    <div class="x2 row clearfix">
                        <div class="column">
                            <h2>День {{ $seasonDaysLeft }}</h2>
                        </div>
                        <div class="date-selector column">
                            <form action="{{ route('calendar:index', [], false) }}" method="GET">
                                <span>&larr; <a href="{{ route('calendar:index', ['date'=>\Date::getDateFromTime($startAt - 86400, 1)], false) }}">назад</a></span>
                                <span class="datepicker-container">
                                    <i class="fa fa-calendar"></i>
                                    <input name="date" class="datepicker" value="{{ Date::getDateFromTime($startAt, 1) }}" onchange="this.form.submit();" type="text" />
                                </span>
                                <span><a href="{{ route('calendar:index', ['date'=>\Date::getDateFromTime($startAt + 86400, 1)], false) }}">вперёд</a> &rarr;</span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection