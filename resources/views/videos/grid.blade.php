<div class="media-grid grid">
    <div class="x2 row clearfix">
        @foreach($videos as $day)
            <div class="column">
                <a href="{{ route('videos:item', ['id'=>$day->id], false) }}" class="image">
                    <img src="/images/medium/{{ $day->getThumbnail() }}.jpg" />
                </a>
                <div class="info clearfix">
                    <div class="stat clearfix">
                        <div class="l">{{ \Date::getDateFromTime($day->start_at) }}, день {{ \Date::seasonDaysLeft($day->start_at) }}</div>
                        <div class="r"><i class="fa fa-eye"></i> {{ $day->video_views }} <i class="fa fa-comment-o"></i> {{ $day->comments_total }}</div>
                    </div>
                    {{ str_limit(strip_tags($day->text), 120) }}
                </div>
            </div>
        @endforeach
    </div>
</div>