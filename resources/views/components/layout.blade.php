<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! SEO::generate() !!}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body data-page="{{ $attributes->get('js-page') }}">
<div class="wrapper">
    <header @class([
        'header',
        'header_hide' => $attributes->get('js-page') === 'tournament',
    ])>
        <div class="header__container">

            <div class="header__logo">
                <a href="{{ route('home') }}">Un<span>trivial</span></a>
            </div>
            <div class="header__menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" @class(['active' => $attributes->get('tab') === 'home'])>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.875 17.375V9.52345C16.8736 9.43696 16.8549 9.35162 16.82 9.27245C16.7851 9.19329 16.7348 9.12191 16.6719 9.06252L10.4219 3.38283C10.3067 3.27742 10.1562 3.21896 10 3.21896C9.84384 3.21896 9.69334 3.27742 9.57813 3.38283L3.32813 9.06252C3.26376 9.12074 3.2124 9.19189 3.1774 9.27132C3.1424 9.35074 3.12454 9.43666 3.125 9.52345V17.375"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1.25 17.375H18.75" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path
                                    d="M11.875 17.375V13C11.875 12.8342 11.8092 12.6753 11.6919 12.5581C11.5747 12.4408 11.4158 12.375 11.25 12.375H8.75C8.58424 12.375 8.42527 12.4408 8.30806 12.5581C8.19085 12.6753 8.125 12.8342 8.125 13V17.375"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Home</a>
                    </li>
                    <li>
                        <a href="{{ route('results') }}" @class(['active' => $attributes->get('tab') === 'results'])>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.375 4.875V9.17969C4.375 12.2812 6.85937 14.8516 9.96094 14.875C10.7029 14.8802 11.4386 14.7385 12.1255 14.4581C12.8125 14.1777 13.4372 13.7642 13.9637 13.2413C14.4902 12.7185 14.908 12.0967 15.1931 11.4117C15.4782 10.7266 15.625 9.99198 15.625 9.25V4.875C15.625 4.70924 15.5592 4.55027 15.4419 4.43306C15.3247 4.31585 15.1658 4.25 15 4.25H5C4.83424 4.25 4.67527 4.31585 4.55806 4.43306C4.44085 4.55027 4.375 4.70924 4.375 4.875Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 18H12.5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M10 14.875V18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path
                                    d="M15.4844 10.5H16.25C16.913 10.5 17.5489 10.2366 18.0178 9.76777C18.4866 9.29893 18.75 8.66304 18.75 8V6.75C18.75 6.58424 18.6842 6.42527 18.5669 6.30806C18.4497 6.19085 18.2908 6.125 18.125 6.125H15.625"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M4.53125 10.5H3.74219C3.07915 10.5 2.44326 10.2366 1.97442 9.76777C1.50558 9.29893 1.24219 8.66304 1.24219 8V6.75C1.24219 6.58424 1.30804 6.42527 1.42525 6.30806C1.54246 6.19085 1.70143 6.125 1.86719 6.125H4.36719"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Results</a>
                    </li>
                </ul>
            </div>
            <div class="header__avatar">
                <x-avatar :user="\App\Facades\TempUserSession::getModelWithId()" />
            </div>

        </div>

    </header>

    <main class="main">
        <div class="main__container">
            {{ $slot }}
        </div>
    </main>

    <footer class="footer">
        <div class="footer__container">

            <div class="footer__body">
                <div class="footer__social">
                    <div>
                        <!-- TikTok -->
                        <a href="#" class="link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.6562 8.20312V12.1094C22.6562 12.3166 22.5739 12.5153 22.4274 12.6618C22.2809 12.8083 22.0822 12.8906 21.875 12.8906C20.243 12.8949 18.6344 12.5028 17.1875 11.748V15.2344C17.1877 16.6463 16.7851 18.0291 16.0269 19.2203C15.2688 20.4115 14.1866 21.3617 12.9074 21.9594C11.6282 22.5571 10.205 22.7775 8.80492 22.5947C7.40482 22.412 6.08591 21.8336 5.00299 20.9275C3.92007 20.0215 3.11808 18.8253 2.69115 17.4794C2.26422 16.1335 2.23007 14.6938 2.5927 13.3292C2.95533 11.9645 3.6997 10.7317 4.73844 9.77529C5.77717 8.81889 7.06718 8.17864 8.45703 7.92969C8.56855 7.90968 8.68308 7.91416 8.79269 7.94283C8.9023 7.9715 9.00436 8.02366 9.0918 8.0957C9.18193 8.16845 9.25428 8.2608 9.30336 8.36571C9.35243 8.47063 9.37694 8.58536 9.375 8.70117V12.7637C9.37542 12.9116 9.33329 13.0565 9.25365 13.1812C9.174 13.3059 9.06019 13.405 8.92578 13.4668C8.6105 13.617 8.34124 13.8489 8.14606 14.1385C7.95087 14.4281 7.8369 14.7647 7.816 15.1133C7.79511 15.4619 7.86806 15.8097 8.02725 16.1205C8.18645 16.4313 8.42607 16.6938 8.72116 16.8805C9.01624 17.0673 9.356 17.1715 9.70505 17.1823C10.0541 17.1931 10.3997 17.1102 10.7058 16.9421C11.0119 16.774 11.2673 16.5269 11.4455 16.2266C11.6236 15.9262 11.718 15.5836 11.7188 15.2344V2.73438C11.7188 2.52717 11.8011 2.32846 11.9476 2.18195C12.0941 2.03543 12.2928 1.95313 12.5 1.95312H16.4062C16.6135 1.95313 16.8122 2.03543 16.9587 2.18195C17.1052 2.32846 17.1875 2.52717 17.1875 2.73438C17.1875 3.97758 17.6814 5.16986 18.5604 6.04894C19.4395 6.92801 20.6318 7.42188 21.875 7.42188C22.0822 7.42188 22.2809 7.50419 22.4274 7.6507C22.5739 7.79721 22.6562 7.99592 22.6562 8.20312Z"
                                    fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <!-- Twitter -->
                        <a href="#" class="link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.9941 7.58789L21.0449 10.5273C20.459 17.3535 14.6973 22.6562 7.8125 22.6562C6.39649 22.6562 5.22461 22.4316 4.33594 21.9922C3.62305 21.6309 3.33008 21.25 3.25195 21.1328C3.18731 21.0346 3.14566 20.9231 3.1301 20.8066C3.11454 20.6901 3.12547 20.5716 3.16208 20.4599C3.19869 20.3482 3.26003 20.2462 3.34153 20.1615C3.42304 20.0768 3.5226 20.0116 3.63281 19.9707C3.65234 19.9609 5.95703 19.082 7.45117 17.3926C6.52455 16.7328 5.71011 15.9283 5.03906 15.0098C3.70117 13.1934 2.28516 10.0391 3.13477 5.33203C3.16147 5.1921 3.22548 5.06197 3.32002 4.9554C3.41456 4.84883 3.53612 4.76977 3.67188 4.72656C3.80806 4.68197 3.95389 4.67569 4.0934 4.70842C4.23291 4.74114 4.36074 4.81161 4.46289 4.91211C4.49219 4.95117 7.74414 8.1543 11.7188 9.18945V8.59375C11.7226 7.97433 11.8484 7.36173 12.089 6.79093C12.3296 6.22012 12.6802 5.7023 13.121 5.26703C13.5617 4.83175 14.0838 4.48754 14.6576 4.25406C15.2313 4.02058 15.8454 3.90239 16.4648 3.90625C17.2778 3.91784 18.0739 4.13983 18.7756 4.55057C19.4773 4.96131 20.0606 5.5468 20.4688 6.25H23.4375C23.5917 6.24952 23.7427 6.2947 23.8713 6.37986C23.9999 6.46501 24.1004 6.58633 24.1602 6.72852C24.2164 6.87282 24.2307 7.03011 24.2013 7.1822C24.172 7.33428 24.1001 7.47493 23.9941 7.58789V7.58789Z"
                                    fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <!-- Instagram -->
                        <a href="#" class="link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.5 15.625C14.2259 15.625 15.625 14.2259 15.625 12.5C15.625 10.7741 14.2259 9.375 12.5 9.375C10.7741 9.375 9.375 10.7741 9.375 12.5C9.375 14.2259 10.7741 15.625 12.5 15.625Z"
                                    fill="white"/>
                                <path
                                    d="M16.7969 2.73438H8.20312C6.75272 2.73438 5.36172 3.31055 4.33613 4.33613C3.31055 5.36172 2.73438 6.75272 2.73438 8.20312V16.7969C2.73438 18.2473 3.31055 19.6383 4.33613 20.6639C5.36172 21.6895 6.75272 22.2656 8.20312 22.2656H16.7969C18.2473 22.2656 19.6383 21.6895 20.6639 20.6639C21.6895 19.6383 22.2656 18.2473 22.2656 16.7969V8.20312C22.2656 6.75272 21.6895 5.36172 20.6639 4.33613C19.6383 3.31055 18.2473 2.73438 16.7969 2.73438ZM12.5 17.1875C11.5729 17.1875 10.6666 16.9126 9.89576 16.3975C9.12491 15.8824 8.5241 15.1504 8.16931 14.2938C7.81453 13.4373 7.7217 12.4948 7.90257 11.5855C8.08344 10.6762 8.52988 9.841 9.18544 9.18544C9.841 8.52988 10.6762 8.08344 11.5855 7.90257C12.4948 7.7217 13.4373 7.81453 14.2938 8.16931C15.1504 8.5241 15.8824 9.12491 16.3975 9.89576C16.9126 10.6666 17.1875 11.5729 17.1875 12.5C17.1875 13.7432 16.6936 14.9355 15.8146 15.8146C14.9355 16.6936 13.7432 17.1875 12.5 17.1875ZM17.5781 8.59375C17.3463 8.59375 17.1198 8.52502 16.9271 8.39625C16.7344 8.26749 16.5842 8.08446 16.4955 7.87033C16.4068 7.6562 16.3835 7.42057 16.4288 7.19325C16.474 6.96593 16.5856 6.75712 16.7495 6.59323C16.9134 6.42934 17.1222 6.31773 17.3495 6.27252C17.5768 6.2273 17.8124 6.25051 18.0266 6.3392C18.2407 6.4279 18.4237 6.5781 18.5525 6.77082C18.6813 6.96353 18.75 7.1901 18.75 7.42188C18.75 7.73268 18.6265 8.03075 18.4068 8.25052C18.187 8.47028 17.8889 8.59375 17.5781 8.59375Z"
                                    fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="footer__links">
                    <h2>
                        <a href="{{ route('home') }}">TQuiz</a>
                    </h2>
                    <div>
                        <a href="#" class="link">Privacy Policy</a>
                    </div>
                    <div>
                        <a href="#" class="link">Terms of Use</a>
                    </div>
                    <div>
                        <a href="#" class="link">About Us</a>
                    </div>
                </div>
            </div>

            <div class="footer__legal">
                All copyrights, trademarks, service marks, trade names, trade dress, product names and logos appearing
                on the site are the property of their respective owners.
            </div>
        </div>
    </footer>
</div>
<x-popup />
</body>
</html>
