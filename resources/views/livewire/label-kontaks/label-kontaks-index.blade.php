<div class="flex flex-col lg:flex-row gap-4">
    <div class="basis-1/2">
        @livewire('label-kontaks.label-kontaks-table')
    </div>
    <div class="basis-2/5">
        @livewire('label-kontaks.label-kontaks-create')
        @livewire('label-kontaks.label-kontaks-edit')
    </div>
    <x-sweet-alert />
    <x-modal-sweet-alert />
</div>
