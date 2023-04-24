@php
    /**
     * @var \Illuminate\Database\Eloquent\Collection<\App\Models\Tournament> $tournaments
     */
@endphp

<div class="tournaments">
    @foreach ($tournaments as $tournament)
        <div class="tournament">

            @if ($tournament->coming_soon)
                <div class="coming_soon"></div>
            @endif

            <div class="tournament__image">
                <img src="/img/tournaments/fortnite.jpg" alt="fortnite">
            </div>

            <div class="tournament__body">

                <div class="tournament__title">
                    {{ $tournament->title }}
                </div>

                <div class="tournament__description">
                    {{ $tournament->description }}
                </div>

                <div class="tournament__footer">
                    <div class="tournament__params">
                        <p>{{ $tournament->players }} Players</p>
                        <p>{{ $tournament->questions }} Questions</p>
                    </div>

                    <div class="tournament__join">
                        <form action="{{ route('tournament.join', $tournament) }}" method="post">
                            <button class="join-button">Join</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    @endforeach

</div>
