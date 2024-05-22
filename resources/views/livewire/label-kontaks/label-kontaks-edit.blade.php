<div>

    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit Label Kontak
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.nama_label" value="Name" />
                    <x-input id="form.nama_label" type="text" class="mt-1 w-full" wire:model="form.nama_label" require
                        autocomplete="form.nama_label" />
                    <x-input-error for="form.nama_label" class="mt-1" />
                </div>


            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
