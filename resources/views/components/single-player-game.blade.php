<div class="tournaments">
        <div class="tournament">
            <div class="tournament__image">
                <img src="/img/singleplayer-logo.png"
                     alt="Singleplayer trivia logo"
                     loading="lazy"
                >
            </div>

            <div class="tournament__body">
                <div class="tournament__title">
                    Singleplayer Trivia
                </div>

                <div class="tournament__description">
                    Test your gaming knowledge by answering questions about popular video games and challenge yourself with our trivia/quiz game
                </div>

                <div class="tournament__footer">
                    <div class="tournament__params">
                        <p>{{ config('singleplayer.questions') }} Questions</p>
                    </div>

                    <div class="tournament__join">
                        <form action="{{ route('single-player.join') }}" method="post">
                            <button class="join-button">Start Trivia</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
</div>
