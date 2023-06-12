<?php

declare(strict_types=1);

namespace App\Services\Seo;

use App\Models\News;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

/**
 * @see https://github.com/artesaos/seotools
 */
class NewsSeo
{
    public function fillNewsPage(): void
    {
        SEOMeta::setTitle('Game News');
        SEOMeta::setDescription('Game News - Untrivial Tournament is an immersive gaming app where players compete in trivia challenges centered around video games. Join thrilling tournaments and test your knowledge on popular titles like Mario, Zelda, The Witcher, GTA, Uncharted, God of War, and more. Prove your expertise, engage in head-to-head battles, and strive to become the ultimate champion of the gaming world.');
//        SEOMeta::setCanonical(config('app.url'));

        OpenGraph::setDescription('Untrivial Tournament is an immersive gaming app where players compete in trivia challenges centered around video games.');
        OpenGraph::setTitle('Game News - Untrivial Tournament');
        OpenGraph::setUrl(config('app.url'));
        OpenGraph::addProperty('type', 'video games');

        TwitterCard::setTitle('Game News - Untrivial Tournament');
        TwitterCard::setSite('@untrivial.gg');

        JsonLd::setTitle('Game News - Untrivial Tournament');
        JsonLd::setDescription('Untrivial Tournament is an immersive gaming app where players compete in trivia challenges centered around video games.');
        JsonLd::addImage('https://untrivial.gg/android-chrome-192x192.png');
    }

    public function fill(News $news): void
    {
        SEOMeta::setTitle($news->title);
        SEOMeta::setKeywords($news->meta_keywords);
        SEOMeta::setDescription($news->meta_description);
//        SEOMeta::setCanonical(config('app.url'));

        OpenGraph::setDescription($news->meta_description);
        OpenGraph::setTitle($news->title . ' - ' . config('app.name'));
        OpenGraph::setUrl(config('app.url'));
        OpenGraph::addProperty('type', 'video games');

        TwitterCard::setTitle('Untrivial Tournament');
        TwitterCard::setSite('@untrivial.gg');

        JsonLd::setTitle('Game News - Untrivial Tournament');
        JsonLd::setDescription('Untrivial Tournament is an immersive gaming app where players compete in trivia challenges centered around video games.');
        JsonLd::addImage('https://untrivial.gg/android-chrome-192x192.png');
    }
}
