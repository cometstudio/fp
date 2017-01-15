@extends('master')

@section('content')

    <div class="content-wrapper">
        <div class="s1 section">
            <div class="wrapper">
                <h1{!! empty($item->text) ? ' class="nomargin"' : '' !!}>{{ $title }}</h1>
                {!! $item->text !!}
            </div>
        </div>

        <div class="s0 section">
            <div class="wrapper">
                <div class="video-player">
                    {!! $item->video !!}
                </div>

                <div class="stat clearfix">
                    <div class="l">{{ \Date::getDateFromTime($item->start_at) }}</div>
                    <div class="r"><i class="fa fa-eye"></i> {{ $item->video_views }} {{ \Dictionary::get('views', $item->video_views) }} <i class="fa fa-comment-o"></i>
                        @if($item->comments_total)
                            <a href="#comments">{{ $item->comments_total }} {{ \Dictionary::get('comments', $item->comments_total) }}</a>
                        @else
                            <a href="#comments">Ваш комментарий</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="s2 section">
            <div class="wrapper">
                @include('comments.container')
            </div>
        </div>
    </div>
@endsection