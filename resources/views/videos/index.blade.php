@extends('master')

@section('content')


    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <h1>{{ $title }}</h1>
            SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards. The protocols allowed users to send and receive messages of up to 160 alpha-numeric characters to and from GSM mobile handsets. Though most SMS messages are mobile-to-mobile text messages, support for the service has expanded to include other mobile technologies, such as ANSI CDMA networks and Digital AMPS, as well as satellite and landline networks.
        </div>
    </div>


    @if(!empty($set) && $set->count())
        <div class="s1 section">
            <div class="wrapper">
                <div class="media-grid grid">
                    <div class="x2 row clearfix">
                        @foreach($set as $item)
                            <div class="column">
                                <a href="{{ route('videos:item', ['id'=>$item->id], false) }}" class="image">
                                    <img src="/images/medium/{{ $item->getThumbnail() }}.jpg" />
                                </a>
                                <div class="info clearfix">
                                    <div class="stat clearfix">
                                        <div class="l">{{ \Date::getDateFromTime($item->start_at) }}</div>
                                        <div class="r"><i class="fa fa-eye"></i> {{ $item->video_views }} <i class="fa fa-comment-o"></i> {{ $item->comments_total }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection