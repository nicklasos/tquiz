<x-layout>
    <x-slot:js-page>home</x-slot:js-page>

    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <x-button class="my-9">
        Why change something if it sells well?
    </x-button>

    <div style="max-width: 500px">

        @include('tournaments.list', $tournaments)

    </div>
</x-layout>
