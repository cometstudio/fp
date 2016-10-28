@if(!empty($item->gallery))
    @foreach($item->getGallery() as $index=>$image)
        <div class="items" id="i{{$index}}">
            @if(!empty($canUpdate))
            <div class="control">
                <div class="bg"></div>
                <a href="{{ route('admin::act', ['action'=>'imagedrop', 'modelName'=>$currentPanelModel->public_model_name, 'id'=>(!empty($item->id) ? $item->id : 0)], false) }}" onclick="return imagedrop(this, {{ $index }});" class="el">Удалить</a>
            </div>
            @endif
            @if(empty($item->id))
                <img src="/images/tmp/thumbs/{{ $image }}.jpg" />
            @else
                <img src="/images/thumbs/{{ $image }}.jpg" />
            @endif
        </div>
    @endforeach
@endif