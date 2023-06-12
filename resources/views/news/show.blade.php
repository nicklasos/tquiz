<x-layout>
    <div id="main-page-container">
        <div class="news-page">
            <div class="news-page__item">
                <h1>{{ $news->title }}</h1>
                @if ($news->getFirstMedia('image'))
                    <div class="news-page__image">
                        {{ $news->getFirstMedia('image') }}
                    </div>
                @endif
                <p>{!! nl2br($news->content) !!}</p>

                <div class="news-page__read_more_news">
                    <a href="{{ route('news') }}" class="join-button">Read more news</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
