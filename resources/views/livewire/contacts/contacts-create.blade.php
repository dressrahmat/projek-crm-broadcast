<div>
    <x-button class="btn-success btn-md text-lg" @click="$wire.set('modalCreate', true)">
        Tambah Data
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
                    <x-input id="form.alamat" type="text" class="mt-1 w-full" wire:model="form.alamat" require
                        autocomplete="form.alamat" />
                    <x-input-error for="form.alamat" class="mt-1" />
                </div>

                <!-- Hobbies -->
                {{-- <div class="col-span-12 mb-4">
                    <x-label for="form.hobbies" value="Hobbies" />
                    <x-tom x-init="$el.hobbies = new Tom($el, {
                        sortField: {
                            field: 'hobbies',
                            direction: 'asc',
                        },
                        valueField: 'hobbies',
                        labelField: 'hobbies',
                        searchField: 'hobbies',
                    });" @set-reset.window="$el.hobbies.clear()" id="form.hobbies"
                        type="text" class="mt-1 w-full" multiple wire:model="form.hobbies">
                        <option></option>
                        @foreach (\App\Helpers\HobbiesHelper::list() as $hobby)
                            <option>{{ $hobby }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.hobbies" class="mt-1" />
                </div> --}}

            </div>
        </x-slot>

        <x-slot name="footer" class="flex justify-between w-full">
            <div class="flex justify-center items-center">
                Silahkan Tekan Tombol Esc Untuk Keluar
            </div>
            <div>
                <x-secondary-button @click="$wire.set('modalCreate', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:loading.attr="disabled">
                    Simpan
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
