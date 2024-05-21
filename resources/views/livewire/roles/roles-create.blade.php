<div>
    <div class="card card-side bg-gray-200 shadow-xl">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Tambah Jabatan</h1>
            </div>
            <form>
                <!-- Nama Jabatan -->
                <div class="mb-2">
                    <label class="form-control">
                        <span class="label-text py-2">Nama Jabatan</span>
                        <input type="text" wire:model="form.name" placeholder="Masukkan nama role"
                            class="input input-primary bg-gray-100 rounded-md  @error('form.name') border-red-500 @enderror"
                            autofocus />
                        @error('form.name')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Nama Hak Akses -->
                <div class="mb-2">
                    <x-label for="form.permissions" value="Hak Akses" />
                    <x-tom x-init="$el.permissions = new Tom($el, {
                        sortField: {
                            field: 'permissions',
                            direction: 'asc',
                        },
                        valueField: 'permissions',
                        labelField: 'permissions',
                        searchField: 'permissions',
                    });" @set-reset.window="$el.permissions.clear()" id="form.permissions"
                        type="text" class="mt-1 w-full" multiple wire:model="form.permissions">
                        <option></option>
                        @foreach ($permissions as $permission)
                            <option>{{ $permission->name }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.permissions" class="mt-1" />
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col gap-y-3 mt-2">
                    <button wire:click.prevent="save()" class="btn btn-primary text-base-100 rounded-md">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
