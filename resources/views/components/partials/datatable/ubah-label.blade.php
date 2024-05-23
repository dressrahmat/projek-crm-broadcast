@foreach ($labelkontaks as $label)
    <button class="btn btn-accent btn-sm" wire:click="ubahLabel({{ $label->id }})">
        {{ $label->nama_label }}
    </button>
@endforeach
