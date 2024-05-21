<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary rounded btn-sm text-base-100']) }}>
    {{ $slot }}
</button>
