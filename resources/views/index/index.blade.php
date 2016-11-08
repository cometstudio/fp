@extends('master')

@section('content')
    <div id="fullpage">
        @for($i=0;$i<3;$i++)
        <div class="section">Some section</div>
        @endfor
        <div>Some section</div>
        <div>Some section</div>
        <div>Some section</div>
        @for($i=0;$i<3;$i++)
            <div class="section">Some section</div>
        @endfor
    </div>
@endsection