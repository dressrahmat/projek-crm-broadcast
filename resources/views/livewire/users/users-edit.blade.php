<div>

    <x-dialog-modal wire:model.live="modalUserEdit" submit="edit">
        <x-slot name="title">
            Form Edit User
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-2">

                <!-- Name -->
                <div class="col-span-12 mb-1">
                    <x-label for="form.name" value="Name" />
                    <x-input id="form.name" type="text" class="mt-1 w-full" wire:model="form.name" require
                        autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Email -->
                <div class="col-span-12 mb-1">
                    <label class="form-control">
                        <span class="label-text py-2">Email</span>
                        <input type="email" wire:model="form.email" placeholder="Masukkan email"
                            class="input input-primary bg-gray-100 rounded-md  @error('form.email') border-red-500 @enderror"
                            autofocus />
                        @error('form.email')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Password -->
                <div class="col-span-12 mb-1">
                    <label class="form-control">
                        <span class="label-text py-2">Password</span>
                        <input type="password" wire:model="form.password" placeholder="Masukkan password"
                            class="input input-primary bg-gray-100 rounded-md  @error('form.password') border-red-500 @enderror"
                            autofocus />
                        @error('form.password')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Nama Roles -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.roles" value="Roles" />
                    <x-tom x-init="$el.roles = new Tom($el, {
                        sortField: {
                            field: 'roles',
                            direction: 'asc',
                        },
                        valueField: 'roles',
                        labelField: 'roles',
                        searchField: 'roles',
                    });"
                        @set-roles-edit.window="
                            $el.roles.addOptions(event.detail.data)
                            $el.roles.addItems(event.detail.data)
                        "
                        id="form.roles" type="text" class="mt-1 w-full" multiple wire:model="form.roles">
                        <option></option>
                        @foreach ($data as $jabatan)
                            <option>{{ $jabatan->name }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.roles" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalUserEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
