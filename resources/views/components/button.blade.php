<button {{ $attributes->merge(['class' => 'button', 'type' => 'button']) }}>
    <div class="button-content">
        {{ $slot }}
    </div>
</button>

