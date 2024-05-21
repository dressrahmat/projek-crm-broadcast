<x-button @click="$dispatch('form-edit', { id: '{{ $row->id }}' })" wire:key="{{ $row->id }}" type="button">
    <i class="fas fa-edit text-base"></i>
</x-button>
