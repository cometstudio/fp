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
                                <input name="" class="datepicker" value="{{ Date::getDateFromTime(time(), 1) }}" type="text" />
                            </span>
                            <a href="">вперёд</a> &rarr;
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
                                <div class="i">
                                    {!! $exercise->text !!}
                                </div>
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
                            @foreach($recipes->filter(function($recipe) use($meal){ return $recipe->meal_id == $meal->id; }) as $recipe)
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

    @if(!empty($calendar->text))
        <div class="s4 section">
            <div class="wrapper">
                {!! $calendar->text !!}}
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
                                <div class="image"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection