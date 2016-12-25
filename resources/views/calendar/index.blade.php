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
                        <h2>День {{ $seasonDaysLeft }}</h2>
                    </div>
                    <div class="date-selector column">
                        <form action="{{ route('calendar:index', [], false) }}" method="GET">
                            &larr; <a href="{{ route('calendar:index', ['date'=>\Date::getDateFromTime($startAt - 86400, 1)], false) }}">назад</a>
                            <span>
                                <i class="fa fa-calendar"></i>
                                <input name="date" class="datepicker" value="{{ Date::getDateFromTime($startAt, 1) }}" onchange="this.form.submit();" type="text" />
                            </span>
                            <a href="{{ route('calendar:index', ['date'=>\Date::getDateFromTime($startAt + 86400, 1)], false) }}">вперёд</a> &rarr;
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($exercises) && $exercises->count())
        <div class="s2 section">
            <div class="wrapper">
                <h3>Упражнения</h3>
                <div class="exercises-grid grid">
                    @foreach($exercises as $exercise)
                    <div class="x2 row clearfix">
                        <div class="column">
                            <div class="wrapper">
                                <p><b>{{ $exercise->name }}</b></p>
                                <p>&nbsp;</p>
                                {!! $exercise->text !!}
                            </div>
                        </div>
                        <div class="column">
                            <div class="wrapper">
                                <p><b>Количество повторений:</b></p>
                                {!! $exercise->notice !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                            @foreach($recipes->filter(function($recipe) use ($meal){ return $recipe->meal_id == $meal->id; }) as $recipe)
                                <div class="x2 row clearfix">
                                    <div class="column">
                                        <div class="wrapper">
                                            <p><b>{{ $recipe->name }}</b></p>
                                            <p>&nbsp;</p>
                                            {!! $recipe->notice !!}
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="wrapper">
                                            {!! $recipe->text !!}

                                            <div class="{{ empty($recipe->text) ? 'nomargin ' : '' }}gallery clearfix">
                                                @foreach($recipe->getGallery() as $image)
                                                    <div class="image">
                                                        <img src="/images/small/{{ $image }}.jpg" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif
                        @if(false && !$j)
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

    @if(!empty($calendar->text))
        <div class="s4 section">
            <div class="wrapper">
                {!! $calendar->text !!}
            </div>
        </div>
    @endif

    @if(!empty($calendar->video))
        <div class="s55 section">
            <div class="wrapper">
                <div class="video-player">
                    {!! $calendar->video !!}
                </div>
            </div>
        </div>
    @endif

    @if(!empty($calendar->gallery))
        <div class="s6 section">
            <div class="wrapper">
                <div class="gallery-grid grid">
                    <div class="x4 row clearfix">
                        @foreach($calendar->getGallery() as $picture)
                            <div class="column">
                                <div class="image">
                                    <img src="/images/small/{{ $picture }}.jpg" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection