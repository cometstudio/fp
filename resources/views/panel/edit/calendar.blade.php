@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    @if(!empty($item->id))
        <div class="row" style="padding-bottom: 10px;">
            <dl>Binded</dl>
            @if(!empty($options['exercises']))
                <div style="margin-bottom: 10px;">
                    <select name="_exercise_id">
                        <option value="">упражнение...</option>
                        @foreach($options['exercises'] as $exercise))
                            <option value="{{ $exercise->id }}">{{ str_limit($exercise->name, 65) }}</option>
                        @endforeach
                    </select> <a onclick="return addBinding(this, $('.calendar-exercises'));" href="{{ route('admin::act', ['action'=>'bindexercise', 'modelName'=>$currentPanelModel->public_model_name, 'id'=>$item->id], false) }}" class="empty button">Привязать</a>
                </div>
            @endif
            <div class="calendar-exercises">
                @include('panel.edit.calendarExercises', ['binded'=>$options['calendarExercises']])
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <dl>Binded</dl>
            @if(!empty($options['recipes']))
                <div style="margin-bottom: 10px;">
                    @if(!empty($options['meals']))
                        <select name="_meal_id">
                            <option value="">приём пищи...</option>
                            @foreach($options['meals'] as $meals))
                                <option value="{{ $meals->id }}">{{ str_limit($meals->name, 65) }}</option>
                            @endforeach
                        </select>
                    @endif
                    <select name="_recipe_id">
                        <option value="">блюдо...</option>
                        @foreach($options['recipes'] as $recipe))
                            <option value="{{ $recipe->id }}">{{ str_limit($recipe->name, 65) }}</option>
                        @endforeach
                    </select> <a onclick="return addBinding(this, $('.calendar-recipes'));" href="{{ route('admin::act', ['action'=>'bindrecipe', 'modelName'=>$currentPanelModel->public_model_name, 'id'=>$item->id], false) }}" class="empty button">Привязать</a>
                </div>
            @endif
            <div class="calendar-recipes">
                @include('panel.edit.calendarRecipes', [
                    'binded'=>$options['calendarRecipes'
                ]])
            </div>
        </div>
    @endif
@endsection