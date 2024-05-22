<div>

    <x-dialog-modal wire:model.live="modalPermissionEdit" submit="edit">
        <x-slot name="title">
            Form Edit Permission
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.name" value="Name" />
                    <x-input id="form.name" type="text" class="mt-1 w-full" wire:model="form.name" require
                        autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>


            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalPermissionEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
