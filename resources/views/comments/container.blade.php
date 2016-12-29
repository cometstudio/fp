<div id="comments">
    <input name="_comments_thread_url" value="{{ route('comments:thread', ['hash'=>$hash], false) }}" type="hidden" />

    <div class="comments-grid">
        <div class="form item clearfix">
            <div class="c1 column">
                <div class="wrapper">
                    <img src="/images/thumbs/{{ $currentUser->getThumbnail() }}.jpg" />
                </div>
            </div>
            <div class="c2 column">
                <div class="wrapper">
                    <form action="{{ route('comments:submit', ['hash'=>$hash], false) }}" method="POST">
                        <div class="info">Ваш текст:</div>
                        <div class="row">
                            <textarea name="text"></textarea>
                        </div>
                        <div class="row">
                            <button onclick="return submitComment();" class="button">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="thread-container comments-grid"></div>
</div>