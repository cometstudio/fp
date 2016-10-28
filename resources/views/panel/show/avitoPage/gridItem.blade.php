<div id="task{{ $item->id }}" class="process-manager-items">
    <div class="col">
        <a href="{{ route('admin::act', ['action'=>'edit', 'modelName'=>$currentPanelModel->public_model_name, 'id'=>$item->id], false) }}">{{ !empty($item->name) ? $item->name : (!empty($item->url) ? $item->url : 'Undefined') }}</a>
    </div>
    @include('panel.show.avitoPage.controls')
</div>