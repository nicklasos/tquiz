<div class="tournaments-leaderboard">

    <x-leaderboard :$game :$leaderboards/>

    <div class="tournaments-leaderboard__buttons">
        <a href="{{ route('home') }}"
           class="tournaments-leaderboard__button question__next_button"
        >Close</a>
    </div>
</div>
