<button {{ $attributes->merge(['class' => 'button', 'type' => 'button']) }}>
    <div class="button-content font-bold">
        {{ $slot }}
    </div>
</button>
