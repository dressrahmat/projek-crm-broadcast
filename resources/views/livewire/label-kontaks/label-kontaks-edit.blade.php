<div>

    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit Label Kontak
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.nama_label" value="Name" />
                    <x-input id="form.nama_label" type="text" class="mt-1 w-full" wire:model="form.nama_label" require
                        autocomplete="form.nama_label" />
                    <x-input-error for="form.nama_label" class="mt-1" />
                </div>

                <div class="overflow-x-auto col-span-12">
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
