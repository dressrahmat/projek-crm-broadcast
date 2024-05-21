<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\PermissionForm;
use App\Livewire\Permissions\PermissionsTable;

class PermissionsCreate extends Component
{
    public PermissionForm $form;

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

        $this->dispatch('form-create')->to(PermissionsTable::class);
    }

    public function render()
    {
        return view('livewire.permissions.permissions-create');
    }
}