<?php

namespace App\Livewire\Devices;

use Livewire\Component;
use App\Livewire\Forms\DeviceForm;
use Illuminate\Support\Facades\DB;
use App\Livewire\Devices\DevicesTable;

class DevicesCreate extends Component
{
    public DeviceForm $form;
    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $simpan = $this->form->store();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            $this->dispatch('set-reset');
            DB::commit();
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan'.$th->getMessage());
            DB::rollback();
        }

        $this->dispatch('form-create')->to(DevicesTable::class);
    }

    public function render()
    {
        return view('livewire.devices.devices-create');
    }
}