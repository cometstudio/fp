<div class="filter grid">
    <form action="" method="get">
        <div class="c2 row clearfix">
            <div class="col"><input name="query" value="{{ request('query') }}" placeholder="Название..." type="text" /></div>
        </div>
        <div class="c4 row clearfix">
            @if(!empty($options['categories']) && $options['categories']->count())
                <div class="col">
                    <select name="cid" style="width: 100%">
                        <option value="">все категории</option>
                        @foreach($options['categories'] as $category)
                            <option value="{{ $category->cat }}"{{ $category->cat == request('cid') ? ' selected' : '' }}>{{ $category->cat }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if(!empty($options['cities']) && $options['cities']->count())
                <div class="col">
                    <select name="city" style="width: 100%">
                        <option value="">все города</option>
                        @foreach($options['cities'] as $city)
                            <option value="{{ $city->sity }}"{{ $city->sity== request('city') ? ' selected' : '' }}>{{ $city->sity }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if(request('city', null) && !empty($options['metrostations']) && $options['metrostations']->count())
                <div class="col">
                    <select name="mstation" style="width: 100%">
                        <option value="">все станции метро</option>
                        @foreach($options['metrostations'] as $station)
                            <option value="{{ $station->metro }}"{{ $station->metro == request('mstation') ? ' selected' : '' }}>{{ $station->metro }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="col"><button  onclick="this.form.submit();" class="button">Показать</button></div>
        </div>
    </form>
</div>
@include('panel.filters.stat')