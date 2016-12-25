@if(!empty($comments) && $comments->count())
    <div class="thread">
        @foreach($comments as $comment)
            <div class="item clearfix">
                <div class="c1 column">
                    <div class="wrapper">
                        <img src="http://c1.staticflickr.com/8/7581/15971467312_14e315296c_m.jpg" />
                    </div>
                </div>
                <div class="c2 column">
                    <div class="wrapper">
                        <div class="info">{{ $comment->user_name }} {{ \Date::getDateFromTime($comment->created_at->timestamp, 3) }}</div>
                        {{ $comment->text }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif