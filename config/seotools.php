<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Untrivial Tournament",
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Untrivial Tournament is an immersive gaming app where players compete in trivia challenges centered around video games. Join thrilling tournaments and test your knowledge on popular titles like Mario, Zelda, Metroid, Splatoon, and more. Prove your expertise, engage in head-to-head battles, and strive to become the ultimate champion of the gaming world. Download now and embark on an epic gaming adventure with Untrivial Tournament!', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [
                'Gaming App',
                'Trivia Challenges',
                'Online Trivia',
                'Skill based',
                'Video Games',
                'Tournaments',
                'Competitive Gaming',
                'Mario, Zelda, The Witcher, GTA, Fallout, Uncharted, Horizon',
                'gaming knowledge',
                'Nintendo',
                'PlayStation',
                'AAA Games',
                'World of Warcraft',
                'Dota 2',
                'Minecraft',
                'Fortnite',
                'Roblox',
            ],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Trivia Tournament', // set false to total remove
            'description' => 'Tournament based trivia games!', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Trivia Tournament', // set false to total remove
            'description' => 'Tournament based trivia games!', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
