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
                            @include('calendar.dateSelector')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection