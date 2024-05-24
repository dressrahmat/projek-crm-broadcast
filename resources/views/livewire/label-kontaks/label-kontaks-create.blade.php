<div>
    <div class="card card-side bg-gray-200 shadow-xl">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Tambah Label Kontak</h1>
            </div>
            <form>
                <!-- Nama Permission -->
                <div class="mb-2">
                    <label class="form-control">
                        <span class="label-text py-2">Nama Label Kontak</span>
                        <input type="text" wire:model="form.nama_label" placeholder="Masukkan Nama Label Kontak"
                            class="input input-primary bg-gray-100 rounded-md  @error('form.nama_label') border-red-500 @enderror"
                            autofocus />
                        @error('form.nama_label')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>
                                    Pilih
                                </th>
                                <th>
                                    Nama Lengkap
                                </th>
                                <th>
                                    Nomor Telepon
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontaks_non_labels as $kontak_non_label)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="kontak_{{ $kontak_non_label->id }}"
                                            wire:model="form.kontaks" value="{{ $kontak_non_label->id }}"
                                            class="checkbox checkbox-primary" />
                                    </td>
                                    <td>
                                        <label for="kontak_{{ $kontak_non_label->id }}" class="cursor-pointer label">
                                            <span class="label-text">{{ $kontak_non_label->nama_lengkap }}</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label for="kontak_{{ $kontak_non_label->id }}" class="cursor-pointer label">
                                            <span class="label-text">{{ $kontak_non_label->nomor_telepon }}</span>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Submit Button -->
                <div class="flex flex-col gap-y-3 mt-2">
                    <button wire:click.prevent="save()" class="btn btn-primary text-base-100 rounded-md">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
