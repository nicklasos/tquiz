@php
    @endphp

@vite(['resources/css/app.scss', 'resources/js/app.js'])

<body data-page="test">

<div id="popup-button">
    <button id="open-popup">open</button>
    <div class="loader"></div>
</div>

-- body --

{{ request()->integer('x') }}

-- end body --

<x-popup />
</body>

<script>

</script>
