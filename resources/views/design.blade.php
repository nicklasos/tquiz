<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.scss'])
</head>
<body>

<div class="wrapper">
    <header class="header">

        <div class="header__container">

            <div class="header__logo">
                <a href="{{ route('home') }}">TQuiz</a>
            </div>
            <div class="header__menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('results') }}">Results</a>
                    </li>
                </ul>
            </div>
            <div class="header__avatar">
                <img src="/img/icons/default_avatar.svg" alt="avatar">
            </div>

        </div>

    </header>
    <main class="main">
        <div class="main__container">
            Main
        </div>
    </main>
    <footer class="footer">
        <div class="footer__container">
            Footer
        </div>
    </footer>
</div>

</body>
</html>
