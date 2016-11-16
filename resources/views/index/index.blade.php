@extends('master')

@section('content')
    @include('common.header')

    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <div class="names">
                <div>
                    Name
                </div>
                <div><img src="/img/two.png" /></div>
                <div>Name</div>
            </div>
            <div class="grid">
                <div class="x2 row clearfix">
                    <div class="column">
                        These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards.
                    </div>
                    <div class="column">
                        SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="s1 section">
        <div class="wrapper">
            <div class="videos-grid grid">
                <div class="x2 row clearfix">
                    <div class="column">
                        <div class="image">
                            <div class="label">Запланировано</div>
                        </div>
                        <div class="info clearfix">
                            <div class="stat clearfix">
                                <div class="l">15 ноября 2016</div>
                            </div>
                            <h3>SMS, as used on modern handsets</h3>
                            SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards.
                        </div>
                    </div>
                    <div class="column">
                        <div class="image">

                        </div>
                        <div class="info clearfix">
                            <div class="stat clearfix">
                                <div class="l">15 ноября 2016</div>
                                <div class="r"><i class="fa fa-eye"></i> {{ rand(0, 200) }} <i class="fa fa-comment-o"></i> {{ rand(0, 20) }}</div>
                            </div>
                            <h3><a href="{{ route('videos:item', ['id'=>1], false) }}">SMS, as used on modern handsets</a></h3>
                            SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="s2 section">
        <div class="wrapper">
            <h2 class="centered">2017 Timeline</h2>
            <div class="timeline">
                <div class="row clearfix">
                    @for($i=1;$i<=5;$i++)
                        <div class="{{ $i == 3 ? 'current ' : '' }}column">
                            <div class="wrapper">
                                <div class="week">{{ $i }}-я неделя</div>
                                <div class="date">25 января</div>
                                <div class="info">
                                    SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols.
                                </div>
                                @if($i < 4)
                                    <a href="" class="empty button">Watch</a>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection