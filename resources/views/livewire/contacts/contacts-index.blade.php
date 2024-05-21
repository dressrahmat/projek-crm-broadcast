<div class="flex flex-col lg:flex-row gap-4">
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
    {{-- <div class="basis-2/5">
        @livewire('roles.roles-create')
        @livewire('roles.roles-edit')
    </div> --}}

</div>
