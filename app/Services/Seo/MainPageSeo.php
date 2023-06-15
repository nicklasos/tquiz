<?php

declare(strict_types=1);

namespace App\Services\Seo;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

/**
 * @see https://github.com/artesaos/seotools
 */
class MainPageSeo
{
    public function fill(): void
    {
        SEOMeta::setTitle('Video Games Trivia');
        SEOMeta::setKeywords('video games trivia, games trivia, quiz, gaming, quiz, nintendo trivia, playstation, minecraft, dota 2, roblox, fortnite, world of warcraft');
        SEOMeta::setDescription('Untrivial Tournament is an immersive video games trivia where players compete in trivia challenges centered around video games. Join thrilling tournaments and test your knowledge on popular titles like Mario, Zelda, The Witcher, GTA, Uncharted, God of War, and more. Prove your expertise, engage in head-to-head battles, and strive to become the ultimate champion of the gaming world.');
        SEOMeta::setCanonical(config('app.url'));

        OpenGraph::setDescription('Untrivial Tournament is an immersive gaming app where players compete in trivia challenges centered around video games.');
        OpenGraph::setTitle('Join Game - Untrivial Tournament');
        OpenGraph::setUrl(config('app.url'));
        OpenGraph::addProperty('type', 'video games');

        TwitterCard::setTitle('Untrivial Tournament');
        TwitterCard::setSite('@untrivial.gg');

        JsonLd::setTitle('Untrivial Tournament');
        JsonLd::setDescription('Untrivial Tournament is an immersive video games trivia where players compete in trivia challenges centered around video games.');
        JsonLd::addImage('https://untrivial.gg/android-chrome-192x192.png');
    }
}
