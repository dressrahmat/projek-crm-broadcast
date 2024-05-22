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
    <div>
        <x-confirm-delete />
    </div>
</div>
