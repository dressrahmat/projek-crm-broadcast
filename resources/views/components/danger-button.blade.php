<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary btn-sm text-base-100']) }}>
    {{ $slot }}
</button>
