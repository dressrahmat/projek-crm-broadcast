<div>
    <x-button class="btn-success btn-md text-lg flex justify-center items-center" @click="$wire.set('modalCreate', true)">
        <span>Tambah Data</span>
        <i class="fas fa-plus-square"></i>
    </x-button>

    <x-dialog-modal wire:model.live="modalCreate" submit="save">
        <x-slot name="title">
            Form Contact
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Nama Lengkap -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.name" value="Nama Lengkap" />
                    <x-input id="form.name" type="text" class="mt-1 w-full" wire:model="form.name" require
                        autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Nomor Telepon -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.device" value="Nomor Telepon" />
                    <x-input id="form.device" type="text" class="mt-1 w-full" wire:model="form.device" require
                        autocomplete="form.device" />
                    <x-input-error for="form.device" class="mt-1" />
                </div>

                <div class="flex gap-2 col-span-12 justify-between">
                    <!-- Auto Read -->
                    <div class="col-span-12 mb-4">
                        <input type="checkbox" wire:model="form.autoread" checked="checked"
                            class="checkbox checkbox-primary" />
                        <span class="label-text">Auto Read</span>
                        <x-input-error for="form.autoread" class="mt-1" />
                    </div>

                    <!-- Personal -->
                    <div class="col-span-12 mb-4">
                        <input type="checkbox" wire:model="form.personal" checked="checked"
                            class="checkbox checkbox-primary" />
                        <span class="label-text">Personal</span>
                        <x-input-error for="form.personal" class="mt-1" />
                    </div>

                    <!-- Group -->
                    <div class="col-span-12 mb-4">
                        <input type="checkbox" wire:model="form.group" checked="checked"
                            class="checkbox checkbox-primary" />
                        <span class="label-text">Group</span>
                        <x-input-error for="form.group" class="mt-1" />
                    </div>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
