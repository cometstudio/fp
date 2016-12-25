@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <h1>{{ $title }}</h1>
            <div class="video-player">
                {!! $item->video !!}
            </div>

            <div class="stat clearfix">
                <div class="l">{{ \Date::getDateFromTime($item->start_at) }}</div>
                <div class="r"><i class="fa fa-eye"></i> {{ $item->video_views }} {{ \Dictionary::get('views', $item->video_views) }} <i class="fa fa-comment-o"></i>
                    @if($item->comments_total)
                        <a href="#comments">{{ $item->comments_total }} {{ \Dictionary::get('comments', $item->comments_total) }}</a>
                    @else
                        <a href="#comments">Оставьте свой комментарий</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="s1 section">
        <div class="wrapper">
            {!! $item->text !!}
        </div>
    </div>

    <div id="comments" class="s2 section">
        <div class="wrapper">
            <input name="_comments_thread_url" value="{{ route('comments:thread', ['hash'=>$hash], false) }}" type="hidden" />

            <div class="comments-grid">
                <div class="form item clearfix">
                    <div class="c1 column">
                        <div class="wrapper">
                            <img src="http://c1.staticflickr.com/8/7581/15971467312_14e315296c_m.jpg" />
                        </div>
                    </div>
                    <div class="c2 column">
                        <div class="wrapper">
                            <form action="{{ route('comments:submit', ['hash'=>$hash], false) }}" method="POST">
                                <div class="info">Ваш текст:</div>
                                <div class="row">
                                    <textarea name="text"></textarea>
                                </div>
                                <div class="row">
                                    <button onclick="return submitComment();">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thread-container comments-grid"></div>
        </div>
    </div>
@endsection