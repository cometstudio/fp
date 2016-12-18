@extends('master')

@section('content')


    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <h1>Фотоотчёты</h1>
            SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards. The protocols allowed users to send and receive messages of up to 160 alpha-numeric characters to and from GSM mobile handsets. Though most SMS messages are mobile-to-mobile text messages, support for the service has expanded to include other mobile technologies, such as ANSI CDMA networks and Digital AMPS, as well as satellite and landline networks.
        </div>
    </div>

    <div class="s1 section">
        <div class="wrapper">
            <div class="videos-grid grid">
                @for($i=0;$i<2;$i++)
                    <div class="x2 row clearfix">
                        @for($j=0;$j<2;$j++)
                            <div class="column">
                                <a href="{{ route('videos:item', ['id'=>1], false) }}" class="image">
                                    @if($i == 1 && $j == 1)
                                        <div class="label">Запланировано</div>
                                    @endif
                                </a>
                                 @if($i == 1 && $j == 1)
                                    <div class="info clearfix">
                                        <div class="stat clearfix">
                                            <div class="l">15 ноября 2016</div>
                                        </div>
                                        <h3>SMS, as used on modern handsets</h3>
                                        SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards.
                                    </div>
                                @else
                                    <div class="info clearfix">
                                        <div class="stat clearfix">
                                            <div class="l">15 ноября 2016</div>
                                            <div class="r"><i class="fa fa-eye"></i> {{ rand(0, 200) }} <i class="fa fa-comment-o"></i> {{ rand(0, 20) }}</div>
                                        </div>
                                        <h3><a href="{{ route('videos:item', ['id'=>1], false) }}">SMS, as used on modern handsets</a></h3>
                                        SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards.
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection