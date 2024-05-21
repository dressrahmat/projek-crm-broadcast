<div>
    <div class="card card-side bg-gray-200 shadow-xl">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Tambah User</h1>
            </div>
            <form>
                <!-- Nama -->
                <div class="mb-2">
                    <label class="form-control">
                        <span class="label-text py-2">Nama</span>
                        <input type="text" wire:model="form.name" placeholder="Masukkan nama user"
                            class="input input-primary bg-gray-100 rounded-md  @error('form.name') border-red-500 @enderror"
                            autofocus />
                        @error('form.name')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Email -->
                <div class="mb-2">
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
                <div class="mb-2">
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

                <!-- Nama Hak Akses -->
                <div class="mb-2">
                    <x-label for="form.roles" value="Hak Akses" />
                    <x-tom x-init="$el.roles = new Tom($el, {
                        sortField: {
                            field: 'roles',
                            direction: 'asc',
                        },
                        valueField: 'roles',
                        labelField: 'roles',
                        searchField: 'roles',
                    });" @set-reset.window="$el.roles.clear()" id="form.roles" type="text"
                        class="mt-1 w-full" multiple wire:model="form.roles">
                        <option></option>
                        @foreach ($role as $jabatan)
                            <option>{{ $jabatan->name }}</option>
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
