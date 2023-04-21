<x-layout>
    <x-slot:js-page>home</x-slot:js-page>

    {{--    <x-tournaments.list :$tournaments></x-tournaments.list>--}}

    <div class="main__text">
        <h1>TQuiz</h1>
        <p>Multiplayer tournament trivia games</p>
    </div>

    <div class="tournaments">

        <div class="tournament">

            <div class="tournament__image">
                <img src="/img/tournaments/fortnite.jpg" alt="fortnite">
            </div>

            <div class="tournament__body">

                <div class="tournament__title">
                    Fortnite
                </div>

                <div class="tournament__description">
                    Know everything about Fortnite?
                </div>

                <div class="tournament__footer">
                    <div class="tournament__params">
                        <p>5 Players</p>
                        <p>6 Questions</p>
                    </div>
                    <div class="tournament__join">
                        <button class="join-button">Join</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-layout>
