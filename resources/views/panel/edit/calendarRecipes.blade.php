@if(!empty($binded))
    <ul style="margin-bottom: 10px;">
        @foreach($binded as $bind)
            <li><a href="{{ route('admin::act', ['action'=>'edit', 'modelName'=>'recipe', 'id'=>$bind->id], false) }}">{{ $bind->name }}</a> <a onclick="return dropBinding(this, $('.calendar-recipes'));" href="{{ route('admin::act', ['action'=>'unbindrecipe', 'modelName'=>$currentPanelModel->public_model_name, 'id'=>$bind->pivot->calendar_id, 'bid'=>$bind->pivot->id], false) }}">Удалить</a></li>
        @endforeach
    </ul>
@endif