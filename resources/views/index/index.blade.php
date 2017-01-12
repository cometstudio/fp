@extends('master')

@section('content')

    <div class="s0 section">
        <div class="wrapper">
            <div class="container">
                <div class="title">
                    <p>1</p>
                    <p>1</p>
                    <p>1</p>
                </div>
                <div class="description">
                    1
                </div>
            </div>
        </div>
    </div>

    @if(!empty($videos) && $videos->count())
        <div class="s1 section">
            <div class="wrapper">
                <div class="grid">
                    <div class="x2 row clearfix">
                        <div class="column">
                            <h2>V</h2>
                        </div>
                        <div class="column clearfix">
                            <a href="{{ route('videos:index', [], false) }}" class="empty pair button">Смотреть все</a>
                        </div>
                    </div>
                </div>

                @include('videos.grid')
            </div>
        </div>
    @endif

    @if(!empty($gallery) && $gallery->count())
        <div class="s2 section">
            <div class="wrapper">
                <div class="grid">
                    <div class="x2 row clearfix">
                        <div class="column">
                            <h2>G</h2>
                        </div>
                        <div class="column clearfix">
                            <a href="{{ route('gallery:index', [], false) }}" class="modal empty pair button">Смотреть все</a>
                        </div>
                    </div>
                </div>

                @include('gallery.grid')
            </div>
        </div>
    @endif

@endsection

@section('_content')

    <div class="s0 section">
        <div class="wrapper">

            <div class="container">
                <p style="font-size: 80px;line-height: 1.2em; text-transform: uppercase;">Эти двое</p>
                <p style="font-size: 36px;line-height: 2em; text-transform: uppercase;">взялись за себя</p>
                <p style="font-size: 88px;line-height: 1.2em; text-transform: uppercase;">всеръёз</p>
                <p>&nbsp;</p>
                <p style="font-size: 20px;line-height: 1.4em;">
                   Регулярные тренировки <br />и строгая диета в течение года <br />сделают из них людей.
                </p>
            </div>

        </div>
    </div>

    @if(!empty($videos) && $videos->count())
        <div class="s1 section">
            <div class="wrapper">
                <div class="grid">
                    <div class="x2 row clearfix">
                        <div class="column">
                            <h2>Недавние видеоотчёты</h2>
                        </div>
                        <div class="column" style="text-align: right;">
                            <a href="{{ route('videos:index', [], false) }}" class="empty pair button">Смотреть все видео</a>
                        </div>
                    </div>
                </div>

                @include('videos.grid')
            </div>
        </div>
    @endif

    @if(!empty($gallery) && $gallery->count())
        <div class="s2 section">
            <div class="wrapper">
                <div class="grid">
                    <div class="x2 row clearfix">
                        <div class="column">
                            <h2>Случайные фотогалереи</h2>
                        </div>
                        <div class="column" style="text-align: right;">
                            <a href="{{ route('gallery:index', [], false) }}" class="modal empty pair button">Смотреть все фото</a>
                        </div>
                    </div>
                </div>

                @include('gallery.grid')
            </div>
        </div>
    @endif

@endsection