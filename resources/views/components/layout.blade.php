<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! SEO::generate() !!}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body class="antialiased font-nunito bg-background -text-white" data-page="{{ $jsPage ?? '' }}">

<div class="flex flex-col justify-between h-screen">

    <!-- Header -->
{{--    <div class="flex justify-center">--}}
{{--        <h1 class="mt-2 text-3xl font-bold">TQuiz</h1>--}}
{{--    </div>--}}

    <!-- Menu -->
    <div class="p-4">
{{--        <x-menu-links />--}}
    </div>

    <div class="m-5">
        <x-button>Join Game</x-button>
    </div>

    <div class="content">
        {{ $slot }}
    </div>


    <!-- Footer -->
    <div class="bg-neutral-800 p-7 mt-14">
        <div class="">
            <div
                class="text-white font-semibold flex flex-col items-center space-y-4"
            >
                <a href="#">TikTok</a>
                <a href="#">Twitter</a>
                <a href="#">Discord</a>
            </div>
            <div
                class="text-white flex flex-col items-center mt-5"
            >
                <div class="flex items-center">
                    <x-icon type="email" />
                    <a href="mailto:{{ config('contact.email') }}" class="ml-1">{{ config('contact.email') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
