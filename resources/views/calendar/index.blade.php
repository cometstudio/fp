@extends('master')

@section('content')


    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <h1>Календарь</h1>
        </div>
    </div>

    <div class="s1 section">
        <div class="wrapper">
            <div class="grid">
                <div class="x2 row clearfix">
                    <div class="column">
                        <h2>День 20</h2>
                    </div>
                    <div class="date-selector column">
                        <form action="">
                            &larr; <a href="">назад</a>
                            <span>
                                <i class="fa fa-calendar"></i>
                                <input name="" value="{{ Date::getDateFromTime(time(), 1) }}" type="text" />
                            </span>
                            <a href="">вперёд</a> &rarr;
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(true)
        <div class="s2 section">
            <div class="wrapper">
                <h3>Упражнения</h3>
                <div class="exercises-grid grid">
                    @for($i=0;$i<3;$i++)
                    <div class="x2 row clearfix">
                        <div class="column">
                            <div class="wrapper">
                                <p><b>Приседания Плие</b></p>
                                <p>&nbsp;</p>
                                <div class="i">
                                    <p>В тренажере Смитта, в глубокий присед, с контролем скорости по всей траектории движения, в верхней точки ноги остаются чуть согнутыми в коленях.</p>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="wrapper">
                                <ul>
                                    <li>12 повторений, легкий вес</li>
                                    <li>10 повторений, средний вес</li>
                                    <li>6 повторений, средне-тяжелый вес</li>
                                    <li>15 повторений, средне-легкий вес</li>
                                    <li>25 повторений, легкий вес</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    @endif

    @if(!empty($meals) && $meals->count())
        <div class="s3 section">
            <div class="wrapper">
                <h3>Рацион питания</h3>
                <div class="food-grid grid">
                    <?php $j = 0; ?>
                    @foreach($meals as $meal)
                        <div class="x1 title row clearfix">
                            <div class="column">
                                <div class="wrapper">
                                    <b>{{ $meal->name }}</b>
                                </div>
                            </div>
                        </div>
                        @if(!empty($recipes) && $recipes->count())
                            @foreach($recipes->filter(function($recipe) use($meal){ return $recipe->meal_id == $meal->id; }) as $recipe)
                                <div class="x2 row clearfix">
                                    <div class="column">
                                        <div class="wrapper">
                                            <p><b>{{ $recipe->name }}</b></p>
                                            <p>&nbsp;</p>
                                            {!! $recipe->ingridients !!}
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="wrapper">
                                            <div class="i">{!! $recipe->text !!}</div>

                                            <div class="{{ empty($recipe->text) ? 'nomargin ' : '' }}gallery clearfix">
                                                @for($i=0;$i<4;$i++)
                                                    <div class="image"></div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif
                        @if(!$j)
                            <div class="x1 row clearfix">
                                <div class="column">
                                    <div class="wrapper">
                                        <div style="background: #efefef; padding: 45px 0; text-align: center; border: 1px dashed #ccc;">Ads place</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    <?php $j++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    <div class="s4 section">
        <div class="wrapper">
            SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards. The protocols allowed users to send and receive messages of up to 160 alpha-numeric characters to and from GSM mobile handsets. Though most SMS messages are mobile-to-mobile text messages, support for the service has expanded to include other mobile technologies, such as ANSI CDMA networks and Digital AMPS, as well as satellite and landline networks.
        </div>
    </div>


    <div class="s55 section">
        <div class="wrapper">
            <div class="video-player"></div>
        </div>
    </div>

    <div class="s6 section">
        <div class="wrapper">
            <div class="gallery-grid grid">
                <div class="x4 row clearfix">
                    @for($i=0;$i<12;$i++)
                        <div class="column">
                            <div class="image"></div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection