@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="content-wrapper">
        <div class="s0 section">
            <div class="wrapper">
                <h1>{{ $title }}</h1>

                @if(!empty($item) && $item->count())
                    <div class="s1 section">
                        <div class="media-grid grid">
                            <div class="x2 row popup-gallery clearfix">
                                @foreach($item->getGallery() as $picture)
                                    <div class="column">
                                        <a href="/images/big/{{ $picture }}.jpg" class="image">
                                            <img src="/images/medium/{{ $picture }}.jpg" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <div class="stat clearfix">
                    <div class="l">{{ \Date::getDateFromTime($item->start_at) }}</div>
                    <div class="r"><i class="fa fa-eye"></i> {{ $item->gallery_views }} {{ \Dictionary::get('views', $item->gallery_views) }} <i class="fa fa-comment-o"></i>
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

        <div class="s2 section">
            <div class="wrapper">
                @include('comments.container')
            </div>
        </div>
    </div>
@endsection