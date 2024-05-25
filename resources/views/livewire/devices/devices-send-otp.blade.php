<div>

    <x-dialog-modal wire:model.live="modalDelete" submit="deleteDevice">
        <x-slot name="title">
            Form Edit Permission
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="otp" value="Masukkan OTP" />
                    <x-input id="otp" type="text" class="mt-1 w-full" wire:model="otp" require
                        autocomplete="otp" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>


            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalDelete', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
