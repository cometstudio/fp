@if(!empty($binded))
    <ul style="margin-bottom: 10px;">
        <?php dd($binded->pluck('meal_id')); ?>
        @foreach($binded->pluck('meal_id') as $mealId)

            <li>{{ $options['meals']->only(2)->first()->name }}</li>
            @foreach($binded->filter(function($binding) use ($mealId){  return $binding->meal_id == $mealId; }) as $binding)
                <li><a href="{{ route('admin::act', ['action'=>'edit', 'modelName'=>'recipe', 'id'=>$binding->id], false) }}">{{ $binding->name }}</a> ({{ $binding->pivot->name }}) <a onclick="return dropBinding(this, $('.calendar-recipes'));" href="{{ route('admin::act', ['action'=>'unbindrecipe', 'modelName'=>$currentPanelModel->public_model_name, 'id'=>$binding->pivot->calendar_id, 'bid'=>$binding->pivot->id], false) }}">Удалить</a></li>
            @endforeach
        @endforeach
    </ul>
@endif