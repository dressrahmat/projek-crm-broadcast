<div>

    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit Customer
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Nama Lengkap -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.nama_lengkap" value="Nama Lengkap" />
                    <x-input id="form.nama_lengkap" type="text" class="mt-1 w-full" wire:model="form.nama_lengkap"
                        require autocomplete="form.nama_lengkap" />
                    <x-input-error for="form.nama_lengkap" class="mt-1" />
                </div>

                <!-- Nomor Telepon -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.nomor_telepon" value="Nomor Telepon" />
                    <x-input id="form.nomor_telepon" type="text" class="mt-1 w-full" wire:model="form.nomor_telepon"
                        require autocomplete="form.nomor_telepon" />
                    <x-input-error for="form.nomor_telepon" class="mt-1" />
                </div>

                <!-- Email -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.email" value="Email" />
                    <x-input id="form.email" type="email" class="mt-1 w-full" wire:model="form.email" require
                        autocomplete="form.email" />
                    <x-input-error for="form.email" class="mt-1" />
                </div>

                <!-- Organisasi -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.organisasi" value="Organisasi" />
                    <x-input id="form.organisasi" type="text" class="mt-1 w-full" wire:model="form.organisasi"
                        require autocomplete="form.organisasi" />
                    <x-input-error for="form.organisasi" class="mt-1" />
                </div>

                <!-- Alamat -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.alamat" value="Alamat" />
                    <textarea wire:model="form.alamat" placeholder="Silahkan Masukkan Pesan"
                        class="textarea textarea-bordered w-full bg-white textarea-primary @error('form.alamat') border-red-500 @enderror"></textarea>
                    <x-input-error for="form.alamat" class="mt-1" />
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
