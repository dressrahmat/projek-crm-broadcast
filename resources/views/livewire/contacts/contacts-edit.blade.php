<div>

    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit Customer
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.nama_lengkap" value="Name" />
                    <x-input id="form.nama_lengkap" type="text" class="mt-1 w-full" wire:model="form.nama_lengkap"
                        require autocomplete="form.nama_lengkap" />
                    <x-input-error for="form.nama_lengkap" class="mt-1" />
                </div>

                <!-- Email -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.email" value="Email" />
                    <x-input id="form.email" type="email" class="mt-1 w-full" wire:model="form.email" require
                        autocomplete="form.email" />
                    <x-input-error for="form.email" class="mt-1" />
                </div>

                <!-- Address -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.alamat" value="Alamat" />
                    <x-input id="form.alamat" type="text" class="mt-1 w-full" wire:model="form.alamat" require
                        autocomplete="form.alamat" />
                    <x-input-error for="form.alamat" class="mt-1" />
                </div>

                <!-- Hobbies -->
                {{-- <div class="col-span-12 mb-4">
                    <x-label for="form.hobbies" value="Hobbies" />
                    <x-tom 
                        x-init="$el.hobbies = new Tom($el, {
                            sortField: {
                                field: 'hobbies',
                                direction: 'asc',
                            },
                            valueField: 'hobbies',
                            labelField: 'hobbies',
                            searchField: 'hobbies',
                        });"
                        @set-hobbies-edit.window="
                            $el.hobbies.addOptions(event.detail.data)
                            $el.hobbies.addItems(event.detail.data)
                        "
                    id="form.hobbies" type="text" class="mt-1 w-full" multiple wire:model="form.hobbies">
                        <option></option>
                        @foreach (\App\Helpers\HobbiesHelper::list() as $hobby)
                        <option>{{ $hobby }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.hobbies" class="mt-1" />
                </div> --}}

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
