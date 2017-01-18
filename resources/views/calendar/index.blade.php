@extends('master')

@section('content')

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
                                <span>&larr; <a href="{{ route('calendar:index', ['date'=>\Date::getDateFromTime($startAt - 86400, 1)], false) }}">назад</a></span>
                                <span class="datepicker-container">
                                    <i class="fa fa-calendar"></i>
                                    <input name="date" class="datepicker" value="{{ Date::getDateFromTime($startAt, 1) }}" onchange="this.form.submit();" type="text" />
                                </span>
                                <span><a href="{{ route('calendar:index', ['date'=>\Date::getDateFromTime($startAt + 86400, 1)], false) }}">вперёд</a> &rarr;</span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($calendar->text))
            <div class="s2 section">
                <div class="wrapper">
                    {!! $calendar->text !!}
                </div>
            </div>
        @endif

        @if(!empty($calendar->video) && $calendar->collect_video)
            <div class="s3 section">
                <div class="wrapper">
                    <div class="video-player">
                        {!! $calendar->video !!}
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($calendar->gallery) && $calendar->collect_gallery)
            <div class="s4 section">
                <div class="wrapper">
                    <div class="gallery-grid grid">
                        <div class="x4 responsive row popup-gallery clearfix">
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

            <div class="s5 section">
                <div class="wrapper">
                    <div class="grid">
                        <div class="x2 row clearfix">
                            <div class="column"><h2>Суточный рацион питания*</h2></div>
                            <div class="small font size column">
                                * Рецепты блюд составлены для мужчины весом 100 кг. Размер порции для женщины весом 55 кг &mdash; меньше на 25%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="s6 section">
                <div class="wrapper">
                    <div class="food-grid grid">
                        <?php $j = 0; ?>
                        @foreach($meals as $meal)

                            <div class="title">
                                <h3>{{ $meal->name }}</h3>
                            </div>

                            @if(!empty($recipes) && $recipes->count())
                                @foreach($recipes->filter(function($recipe) use ($meal){ return $recipe->meal_id == $meal->id; }) as $recipe)
                                    <div class="name">{{ $recipe->name }}</div>
                                    @if(!empty($recipe->notice) || !empty($recipe->text) || !empty($recipe->gallery))
                                        <div class="x2 row clearfix">
                                            <div class="column">
                                                <div class="wrapper">
                                                    {!! $recipe->notice !!}
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="wrapper">
                                                    {!! $recipe->text !!}
                                                    @if(!empty($recipe->gallery))
                                                        <div class="{{ empty($recipe->text) ? 'nomargin ' : '' }}gallery popup-gallery clearfix">
                                                            @foreach($recipe->getGallery() as $picture)
                                                                <a href="/images/big/{{ $picture }}.jpg" class="image">
                                                                    <img src="/images/small/{{ $picture }}.jpg" />
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif

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
                    <div>
                        <h3>Питательная ценность суточного рациона, суммарно</h3>
                    </div>
                    <div class="macros-table grid">
                        <div class="row clearfix">
                            <div class="column">&nbsp;</div>
                            <div class="column">
                                <span class="desktop-visible">Мужчины</span>
                                <span class="mobile-visible">М</span>
                            </div>
                            <div class="column">
                                <span class="desktop-visible">Женщины</span>
                                <span class="mobile-visible">Ж</span>
                            </div>
                            <div class="column">
                                <span class="desktop-visible">% от нормы</span>
                                <span class="mobile-visible">%</span>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="column">Белки, г</div>
                            <div class="column">{{ $totalMacros['protein'] }}</div>
                            <div class="column">{{ $totalMacros['protein_f'] }}</div>
                            <div class="{{ $totalMacros['protein_daily']['active'] ? 'active ' : '' }}daily column">{{ $totalMacros['protein_daily']['total'] }}%</div>
                        </div>
                        <div class="row clearfix">
                            <div class="column">Жиры, г</div>
                            <div class="column">{{ $totalMacros['fat'] }}</div>
                            <div class="column">{{ $totalMacros['fat_f'] }}</div>
                            <div class="{{ $totalMacros['fat_daily']['active'] ? 'active ' : '' }}daily column">{{ $totalMacros['fat_daily']['total'] }}%</div>
                        </div>
                        <div class="row clearfix">
                            <div class="column">Углеводы, г</div>
                            <div class="column">{{ $totalMacros['carbohydrates'] }}</div>
                            <div class="column">{{ $totalMacros['carbohydrates_f'] }}</div>
                            <div class="{{ $totalMacros['carbohydrates_daily']['active'] ? 'active ' : '' }}daily column">{{ $totalMacros['carbohydrates_daily']['total'] }}%</div>
                        </div>
                        <div class="row clearfix">
                            <div class="column">Энергия, ККал</div>
                            <div class="column">{{ $totalMacros['energy'] }}</div>
                            <div class="column">{{ $totalMacros['energy_f'] }}</div>
                            <div class="{{ $totalMacros['energy_daily']['active'] ? 'active ' : '' }}daily column">{{ $totalMacros['energy_daily']['total'] }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($exercises) && $exercises->count())
            <div class="s7 section">
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

        <div class="s8 section">
            <div class="wrapper">
                @include('comments.container')
            </div>
        </div>
    </div>
@endsection