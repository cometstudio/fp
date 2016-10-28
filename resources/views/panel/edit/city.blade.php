@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    @if(!empty($options['regions']))
        <div class="row">
            <dl>Регион</dl>
            <select name="region_remote_id">
                <option value="0"></option>
                @foreach($options['regions'] as $region)
                    <option value="{{ $region->remote_id }}"{{ $item->region_remote_id == $region->remote_id ? ' selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    <div class="row">
        <dl>URL</dl>
        <input name="url" value="{{ $item->url }}" type="text" class="x2" />
    </div>
    <div class="row">
        <dl>ID</dl>
        <input name="remote_id" value="{{ $item->remote_id }}" type="text" class="x2" />
    </div>
@endsection