<div>

    <x-dialog-modal wire:model.live="modalRoleEdit" submit="edit">
        <x-slot name="title">
            Form Edit Role
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

                <!-- Nama Hak Akses -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.permissions" value="Hak Akses" />
                    <x-tom x-init="$el.permissions = new Tom($el, {
                        sortField: {
                            field: 'permissions',
                            direction: 'asc',
                        },
                        valueField: 'permissions',
                        labelField: 'permissions',
                        searchField: 'permissions',
                    });"
                        @set-permissions-edit.window="
                            $el.permissions.addOptions(event.detail.data)
                            $el.permissions.addItems(event.detail.data)
                        "
                        id="form.permissions" type="text" class="mt-1 w-full" multiple wire:model="form.permissions">
                        <option></option>
                        @foreach ($permissions as $permission)
                            <option>{{ $permission->name }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.permissions" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalRoleEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
