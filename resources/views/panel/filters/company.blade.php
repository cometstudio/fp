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
            @if(!empty($options['categories']) && $options['categories']->count())
                <div class="col">
                    <select name="_category">
                        <option value="">все категории</option>
                        @foreach($options['categories'] as $category)
                            <option value="{{ $category->id }}"{{ $category->id== request('cid') ? ' selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="col"><button  onclick="this.form.submit();" class="button">Показать</button></div>
        </div>
    </form>
</div>
@include('panel.filters.stat')