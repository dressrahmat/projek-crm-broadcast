<div>
    <div class="card card-side bg-gray-200 shadow-xl">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Tambah Hak Akses</h1>
            </div>
            <form>
                <!-- Nama Permission -->
                <div class="mb-2">
                    <label class="form-control">
                        <span class="label-text py-2">Nama Permission</span>
                        <input type="text" wire:model="form.name" placeholder="Masukkan nama role"
                            class="input input-primary bg-gray-100 rounded-md  @error('form.name') border-red-500 @enderror"
                            autofocus />
                        @error('form.name')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col gap-y-3 mt-2">
                    <button wire:click.prevent="save()" class="btn btn-primary text-base-100 rounded-md">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
