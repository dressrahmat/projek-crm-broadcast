<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Permission;
use App\Livewire\Permissions\PermissionsTable;

class PermissionsEdit extends Component
{
    public PermissionForm $form;

    public $modalPermissionEdit = false;

    #[On('form-edit')]
    public function set_form(Permission $id)
    {
        $this->form->setForm($id);

        $this->modalPermissionEdit = true;
    }

    public function edit()
    {
        $this->validate();

        try {
            $simpan = $this->form->update();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil diupdate');
            $this->dispatch('set-reset');
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal diupdate'.$th->getMessage());
        }

        $this->dispatch('form-edit')->to(PermissionsTable::class);
    }
    public function render()
    {
        return view('livewire.permissions.permissions-edit');
    }
}