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
                    Get better or die
                </div>
                <a href="" class="button">Come with us</a>
            </div>
        </div>
    </div>
    <div class="section-1">
        <div class="content wrapper">
            <h2>Header 2</h2>
            <div class="grid">
                <div class="x3 row clearfix">
                    <div class="column">
                        <span class="fa fa-fire"></span>
                        Москва — столица Российской Федерации, <a href="">город</a> федерального значения, административный центр Центрального федерального округа и центр Московской области, в состав которой не входит.
                    </div>
                    <div class="column">
                        <span class="fa fa-bullhorn"></span>
                        Москва — столица Российской Федерации, <a href="">город</a> федерального значения, административный центр Центрального федерального округа и центр Московской области, в состав которой не входит.
                    </div>
                    <div class="black column">
                        <span class="fa fa-sign-language"></span>
                        Москва — столица Российской Федерации, <a href="">город</a> федерального значения, административный центр Центрального федерального округа и центр Московской области, в состав которой не входит.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-2">
        <div class="content wrapper">
            <h2>Header 2</h2>
            <div class="teaser">
                <p>Москва — столица Российской Федерации, город федерального значения, административный центр Центрального федерального округа и центр Московской области, в состав которой не входит. Крупнейший по численности населения город России и её субъект — 12 330 126 чел. (2016), самый населённый из городов, полностью расположенных в Европе, входит в первую десятку городов мира по численности населения.</p>
            </div>
            <div class="video cards-grid grid">
                <div class="x4 row clearfix">
                    @for($i=0;$i<4;$i++)
                        @if(!$i)
                           <div class="planned column">
                                <a href=""><img src="/img/indexPage1.jpg" /></a>
                                <div class="info">
                                    <div class="title"><a href="">Входит в первую десятку городов мира по численности населения.</a></div>
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
                                <a href=""><img src="/img/indexPage1.jpg" /></a>
                                <div class="info">
                                    <div class="title"><a href="">Входит в первую десятку городов мира по численности населения.</a></div>
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
                <div class="more">
                    <a href="/videos" class="empty button">See them all</a> <a href="http://youtube.com" target="_blank" class="empty button">Our YouTube Channel</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-3">
        <div class="content wrapper">
            <h2>Header 2</h2>
            <div class="teaser">
                <p>Москва — столица Российской Федерации, город федерального значения, административный центр Центрального федерального округа и центр Московской области, в состав которой не входит. Крупнейший по численности населения город России и её субъект — 12 330 126 чел. (2016), самый населённый из городов, полностью расположенных в Европе, входит в первую десятку городов мира по численности населения.</p>
            </div>
        </div>
    </div>
@endsection