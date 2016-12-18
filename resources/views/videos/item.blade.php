@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <h1>Modern handsets</h1>
            <div class="video-player"></div>
            <div class="stat clearfix">
                <div class="l">15 ноября 2016</div>
                <div class="r"><i class="fa fa-eye"></i> {{ rand(0, 200) }} <i class="fa fa-comment-o"></i> {{ rand(0, 20) }}</div>
            </div>
        </div>
    </div>

    <div class="s1 section">
        <div class="wrapper">
            SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards. The protocols allowed users to send and receive messages of up to 160 alpha-numeric characters to and from GSM mobile handsets. Though most SMS messages are mobile-to-mobile text messages, support for the service has expanded to include other mobile technologies, such as ANSI CDMA networks and Digital AMPS, as well as satellite and landline networks.
        </div>
    </div>

    <div class="s2 section">
        <div class="wrapper">
            <div class="comments-grid">
                @for($i=0;$i<3;$i++)
                    <div class="{{ !$i ? 'form ' : '' }}item clearfix">
                        <div class="c1 column">
                            <div class="wrapper">
                                <img src="http://c1.staticflickr.com/8/7581/15971467312_14e315296c_m.jpg" />
                            </div>
                        </div>
                        <div class="c2 column">
                            <div class="wrapper">
                                @if(!$i)
                                    <div class="info">Name (You):</div>
                                    <div class="row">
                                        <textarea name=""></textarea>
                                    </div>
                                    <div class="row">
                                        <button onclick="return false;">Submit</button>
                                    </div>
                                @else
                                    <div class="info">Name 15 of November 2016 at 17:40</div>
                                    SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols.
                                @endif
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection