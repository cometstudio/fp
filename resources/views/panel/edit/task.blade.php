@extends('panel.edit.form')

@section('input')
    <div class="row">
        <dl>Название</dl>
        <input name="name" value="{{ $item->name }}" type="text" />
    </div>
    <div class="row">
        <dl>Команда</dl>
        <input name="command" value="{{ $item->command }}" type="text" />
    </div>
    <div class="row">
        <input name="output_to_a_file" value="0" type="hidden" />
        <label><input name="output_to_a_file" value="1" type="checkbox"{{ !empty($item->output_to_a_file) ? ' checked' : '' }} /> вывод в файл</label>
    </div>
    <div class="row">
        <dl>Дата прошлого запуска</dl>
        <input name="_start_date" value="{{ $item->getStartDate() }}" type="text" class="x4 datepicker" autocomplete="off" /> в
        <select name="_hrs">
            @for($i=0;$i<24;$i++)
                <option value="{{ $i }}"{{ date('G', $item->started_at) == $i ? ' selected' : '' }}>{{ $i }}</option>
            @endfor
        </select> :
        <select name="_mins">
            @for($i=0;$i<60;$i=$i+5)
                <option value="{{ $i }}"{{ date('i', $item->started_at) == $i ? ' selected' : '' }}>{{ ($i < 10) ? 0 : '' }}{{ $i  }}</option>
            @endfor
        </select>
    </div>
    <div class="row">
        <dl>Last PID</dl>
        <input name="pid" value="{{ !empty($item->pid) ? $item->pid : '' }}" type="text" class="x3" />
    </div>
@endsection