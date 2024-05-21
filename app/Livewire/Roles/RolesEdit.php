<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoleForm;
use App\Livewire\Roles\RolesTable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesEdit extends Component
{
    public RoleForm $form;

    public $modalRoleEdit = false;

    #[ On('form-edit')]
    public function set_form(Role $id)
    {
        $this->form->setForm($id);
        $get_permissions = Permission::whereIn('id', $this->form->role->permissions->pluck('id'))->pluck('name');

        $this->dispatch('set-permissions-edit', data: collect($get_permissions));
        $this->modalRoleEdit = true;
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

        $this->dispatch('form-update')->to(RolesTable::class);
    }
    public function render()
    {
        $permissions = Permission::get();
        return view('livewire.roles.roles-edit', compact('permissions'));
    }
}