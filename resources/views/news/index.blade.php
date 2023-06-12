<x-layout>
    <div id="main-page-container">
        <div class="main__text">
            <h1>Game News</h1>
            <p>Latest news about gaming industry</p>
        </div>

        <hr>

        <div class="news">
            @if ($latestNews->count())
                @foreach ($latestNews as $news)
                    <div class="news__item">
                        <h1>{{ $news->title }}</h1>
                        <p>{{ $news->preview_text }}</p>
                        <a href="{{ route('news.show', $news) }}" class="join-button">Read more...</a>
                    </div>
                @endforeach
            @else
                <h2>Stay tuned...</h2>
            @endif
        </div>
    </div>
</x-layout>
