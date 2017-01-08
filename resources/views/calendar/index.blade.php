@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="content-wrapper">
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

        @if(!empty($calendar->text))
            <div class="s4 section">
                <div class="wrapper">
                    {!! $calendar->text !!}
                </div>
            </div>
        @endif

        @if(!empty($calendar->video) && $calendar->collect_video)
            <div class="s55 section">
                <div class="wrapper">
                    <div class="video-player">
                        {!! $calendar->video !!}
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($calendar->gallery) && $calendar->collect_gallery)
            <div class="s6 section">
                <div class="wrapper">
                    <div class="gallery-grid grid">
                        <div class="x4 row popup-gallery clearfix">
                            @foreach($calendar->getGallery() as $picture)
                                <div class="column">
                                    <div class="image">
                                        <a href="/images/big/{{ $picture }}.jpg" class="image">
                                            <img src="/images/small/{{ $picture }}.jpg" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($meals) && $meals->count())
            <div class="s3 section">
                <div class="wrapper">
                    <div class="grid">
                        <div class="x2 row clearfix">
                            <div class="column"><h2>Суточный рацион питания*</h2></div>
                            <div class="small font size column" style="text-align: right;">
                                <p>* Рецепты блюд составлены для мужчины весом 100 кг</p>
                                <p>Размер порции для женщин весом 60 кг меньше на 40%</p>
                            </div>
                        </div>
                    </div>
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

                                                @if(!empty($recipe->macros))
                                                    <div class="{{ empty($recipe->text) ? 'nomargin ' : '' }}macros-table">
                                                        <div class="_row clearfix">
                                                            <div class="column">&nbsp;</div>
                                                            <div class="column">Белок</div>
                                                            <div class="column">Жиры</div>
                                                            <div class="column">Углеводы</div>
                                                            <div class="column">Энергия</div>
                                                        </div>
                                                        <div class="_row clearfix">
                                                            <div class="column">Мужчины</div>
                                                            <div class="column">{{ $recipe->macros['protein'] }}</div>
                                                            <div class="column">{{ $recipe->macros['fat'] }}</div>
                                                            <div class="column">{{ $recipe->macros['carbohydrates'] }}</div>
                                                            <div class="column">{{ $recipe->macros['energy'] }}</div>
                                                        </div>
                                                        <div class="_row clearfix">
                                                            <div class="column">Женщины</div>
                                                            <div class="column">{{ $recipe->macros['protein_f'] }}</div>
                                                            <div class="column">{{ $recipe->macros['fat_f'] }}</div>
                                                            <div class="column">{{ $recipe->macros['carbohydrates_f'] }}</div>
                                                            <div class="column">{{ $recipe->macros['energy_f'] }}</div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="gallery popup-gallery clearfix">
                                                    @foreach($recipe->getGallery() as $picture)
                                                        <a href="/images/big/{{ $picture }}.jpg" class="image">
                                                            <img src="/images/small/{{ $picture }}.jpg" />
                                                        </a>
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
                <div class="wrapper">
                    <h3>Питательная ценность суточного рациона, суммарно</h3>
                    <div class="macros-table grid">
                        <div class="_row clearfix">
                            <div class="column">&nbsp;</div>
                            <div class="column">Белок, грамм</div>
                            <div class="column">Жиры, грамм</div>
                            <div class="column">Углеводы, грамм</div>
                            <div class="column">Энергия, ККал</div>
                        </div>
                        <div class="_row clearfix">
                            <div class="column">Мужчины</div>
                            <div class="column">{{ $totalMacros['protein'] }}</div>
                            <div class="column">{{ $totalMacros['fat'] }}</div>
                            <div class="column">{{ $totalMacros['carbohydrates'] }}</div>
                            <div class="column">{{ $totalMacros['energy'] }}</div>
                        </div>
                        <div class="_row clearfix">
                            <div class="column">Женщины</div>
                            <div class="column">{{ $totalMacros['protein_f'] }}</div>
                            <div class="column">{{ $totalMacros['fat_f'] }}</div>
                            <div class="column">{{ $totalMacros['carbohydrates_f'] }}</div>
                            <div class="column">{{ $totalMacros['energy_f'] }}</div>
                        </div>
                        <div class="daily _row clearfix">
                            <div class="column">% от нормы</div>
                            <div class="{{ $totalMacros['protein_daily']['active'] ? 'active ' : '' }}column">{{ $totalMacros['protein_daily']['value'] }}%</div>
                            <div class="{{ $totalMacros['fat_daily']['active'] ? 'active ' : '' }}column">{{ $totalMacros['fat_daily']['value'] }}%</div>
                            <div class="{{ $totalMacros['carbohydrates_daily']['active'] ? 'active ' : '' }}column">{{ $totalMacros['carbohydrates_daily']['value'] }}%</div>
                            <div class="{{ $totalMacros['energy_daily']['active'] ? 'active ' : '' }}column">{{ $totalMacros['energy_daily']['value'] }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($exercises) && $exercises->count())
            <div class="s2 section">
                <div class="wrapper">
                    <h2>Упражнения</h2>
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

        <div class="s7 section">
            <div class="wrapper">
                @include('comments.container')
            </div>
        </div>
    </div>
@endsection