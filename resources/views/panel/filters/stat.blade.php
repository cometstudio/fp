@if(!empty($items) && method_exists($items, 'total'))
    <div class="stat clearfix">
        <ul>
            <li>Всего: <b>{{ $items->total() }}</b></li>
        </ul>
        <ul>
            <li><span class="fa fa-file-excel-o"></span> <a onclick="return exportAsExcel(this);" href="{{ route('admin::exportAsExcel', ['modelName'=>$currentPanelModel->public_model_name, 'format'=>'csv'], false) }}" target="_blank">Экспорт в Excel</a> (.csv)</li>
        </ul>
    </div>
@endif