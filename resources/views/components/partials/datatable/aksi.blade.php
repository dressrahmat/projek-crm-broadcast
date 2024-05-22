<div class="flex gap-1">
    <x-button @click="$dispatch('form-edit', { id: '{{ $row->id }}' })" wire:key="{{ $row->id }}" type="button">
        <i class="fas fa-edit text-base"></i>
    </x-button>
    <x-danger-button @click="$dispatch('confirm-delete', { get_id: '{{ $row->id }}' })">
        <i class="fas fa-trash-alt text-base"></i>
    </x-danger-button>
</div>
