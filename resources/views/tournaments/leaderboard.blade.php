<div class="tournaments-leaderboard">

    <x-leaderboard :$game :$leaderboards/>

    <div class="tournaments-leaderboard__buttons" id="close-leaderboard-button-container">
        <a href="{{ route('home') }}"
           class="tournaments-leaderboard__button question__next_button js-close-leaderboard-button"
        >Close</a>
    </div>
</div>
