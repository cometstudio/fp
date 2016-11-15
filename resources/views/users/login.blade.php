@extends('master')

@section('content')

    @include('common.mainNav')

    <div class="s0 section">
        <div class="wrapper">
            <h1>Login or signup</h1>
            <div class="form grid">
                <div class="x2 row clearfix">
                    <div class="column">
                        <div class="row">
                           <label><input name="" type="checkbox" value="1" onclick="$('#name').toggle(); $('#forgotten').toggle();" /> it is my first time here, sign me up</label>
                        </div>
                        <div id="name" class="hidden row">
                           <div class="label">Name</div>
                            <input name="" type="text" />
                        </div>
                        <div class="row">
                           <div class="label clearfix">
                               E-mail
                           </div>
                            <input name="" type="text" />
                        </div>
                        <div class="row">
                           <div class="label">Password <a href="" id="forgotten" style="float: right;">I have forgotten</a></div>
                            <input name="" type="text" />
                        </div>
                        <div class="row">
                           <button onclick="return false;">Submit</button>
                        </div>
                    </div>
                    <div class="column" style="padding-top: 61px;">
                        Российская рок-группа. Основателями группы являются Шура Би-2 и Лёва Би-2. Группа была основана в городе Бобруйске в 1988 году, но активную деятельность возобновила только после переезда в 1999 году в Россию.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection