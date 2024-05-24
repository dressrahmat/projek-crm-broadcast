<div class="flex flex-col-reverse xl:flex-row gap-4">
    <div class="basis-1/2 card bg-slate-100 shadow-xl">
        <div class="flex justify-between items-center bg-slate-600 p-3 overflow-hidden">
            <div>
                <h6 class="font-bold text-3xl text-slate-50">Data Kontak</h6>
            </div>
            <div>
                @livewire('contacts.contacts-create')
            </div>
        </div>
        <div class="card-body">
            <div class="flex justify-between">
                <div class="grid grid-cols-2 h-fit gap-2">
                    @if ($ubah_label)
                        @include('components.partials.datatable.ubah-label')
                    @endif
                </div>
                <div>
                    <div>
                        <form wire:submit.prevent="import" enctype="multipart/form-data"
                            class="flex flex-col gap-1 items-end">
                            <input wire:model="file" type="file"
                                class="file-input file-input-bordered file-input-xs w-full max-w-xs" />
                            @error('file')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror

                            <!-- Tidak perlu menambahkan tombol submit secara eksplisit -->
                            <button type="submit" class="btn btn-success btn-sm text-white">Import</button>
                        </form>
                    </div>

                </div>
            </div>
            @livewire('contacts.contacts-table')
        </div>
    </div>
    <div class="basis-2/5">
        <!-- {Pesan} -->
        <div class="mb-2 bg-slate-100 rounded-md shadow-xl">
            <div class="bg-slate-600 p-3 mb-3">
                <span class="label-text font-bold text-3xl text-slate-50 mb-2">Pesan</span>
            </div>
            <label class="form-control p-5">
                <textarea wire:model.live="pesan" placeholder="Silahkan Masukkan Pesan" wire:keyup="refreshSearch"
                    class="textarea textarea-bordered rounded-lg bg-gray-100 text-gray-500 textarea-primary xl:h-96 @error('pesan') border-red-500 @enderror"></textarea>
                @error('pesan')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>
    </div>
    <div>
        @livewire('contacts.contacts-edit')
    </div>
    <x-sweet-alert />
    <x-modal-sweet-alert />
    <div>
        <x-confirm-delete />
    </div>
</div>
