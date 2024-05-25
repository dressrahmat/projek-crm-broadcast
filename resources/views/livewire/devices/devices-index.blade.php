<div class="flex flex-col lg:flex-row gap-4">
    <div class="basis-full">
        @livewire('devices.devices-table')
    </div>
    {{-- <div class="basis-2/5">
        @livewire('devices.devices-create')
        @livewire('devices.devices-edit')
    </div> --}}
    <x-modal-otp-fonnte />
</div>
