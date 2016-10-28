@extends('master')

@section('content')
    <div class="top-teaser" style="background-image: url('/img/topTeaser.jpg');">
        <div class="content wrapper">
            <div class="nav clearfix">
                <div class="l">
                    <a href="/" class="logo-tag">#tag</a>
                </div>
                <div class="r">
                    <nav>
                        <a href="/videos">Point</a>
                        <a href="">Point</a>
                        <a href="">Point</a>
                    </nav>
                </div>
            </div>
            <div class="centered">
                <h1>Header 1</h1>
                <div class="inspire">
                    Follow us also on <a href="http://youtube.com" target="_blank">our YouTube Channel</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-1">
        <div class="content wrapper">
            <div class="video cards-grid grid">
                <div class="x4 row clearfix">
                    @for($i=0;$i<12;$i++)
                        @if(!$i)
                           <div class="planned column">
                                <a href="{{ route('videos:item', ['id'=>1], false) }}"><img src="/img/indexPage1.jpg" /></a>
                                <div class="info">
                                    <div class="title"><a href="{{ route('videos:item', ['id'=>1], false) }}">Входит в первую десятку городов мира по численности населения.</a></div>
                                    <div class="details grid">
                                        <div class="x2 row clearfix">
                                            <div class="column"><span class="fa fa-clock-o"></span> 20 февраля 2017</div>
                                            <div class="column"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="column">
                                <a href="{{ route('videos:item', ['id'=>1], false) }}"><img src="/img/indexPage1.jpg" /></a>
                                <div class="info">
                                    <div class="title"><a href="{{ route('videos:item', ['id'=>1], false) }}">Входит в первую десятку городов мира по численности населения.</a></div>
                                    <div class="details grid">
                                        <div class="x2 row clearfix">
                                            <div class="column">20 января 2017</div>
                                            <div class="column"><span class="fa fa-eye"></span> {{ 523 * $i }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endfor
                </div>
                <div class="medium font size more">
                    Also you can find us on <span class="fa fa-instagram"></span> <a href="http://vk.com" target="_blank">Instagram</a>
                </div>
            </div>
        </div>
    </div>
@endsection