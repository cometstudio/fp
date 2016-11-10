@extends('master')

@section('content')
    <div class="s1 section">
        <div class="wrapper">
            <h1>Erno Rubik</h1>
            <div class="grid">
                <div class="x2 row clearfix">
                    <div class="column">
                        In 1974, a young Professor of architecture in <a href="">Budapest</a> (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young <b>Professor of architecture</b> in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="s2 section">
        <div class="wrapper">
            <h2>Professor of architecture in Budapest</h2>
            <div class="grid">
                <div class="x4 row clearfix">
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="s3 section">
        <div class="wrapper">
            <h2>Youth</h2>
            <div class="grid">
                <div class="x4 row clearfix">
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                    <div class="column">
                        In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="s4 section">
        <div class="wrapper">
            <div class="matrix-grid">
                <div class="x4 row clearfix">
                    @for($i=0;$i<4;$i++)
                        <div class="column">
                            <img src="https://s.yimg.com/uy/build/images/sohp/inspiration/jumping-for-sand3.jpg" />
                            <div class="info">
                               <h3>Hi has created an object that was not supposed to be possible</h3>
                                In 1974, a young Professor of architecture in Budapest (Hungary) named Erno Rubik created an object that was not supposed to be possible. His solid cube twisted and turned - and still it did not break or fall apart.
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection