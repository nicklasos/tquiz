<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Queries\News\NewsQuery;
use App\Services\Seo\NewsSeo;

class NewsController extends Controller
{
    public function __construct(private readonly NewsSeo $seo)
    {
    }

    public function index(NewsQuery $newsQuery)
    {
        $this->seo->fillNewsPage();

        return view('news.index', [
            'latestNews' => $newsQuery->latest(),
        ]);
    }

    public function show(News $news)
    {
        $this->seo->fill($news);

        return view('news.show', compact('news'));
    }
}
