<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public ?Role $role;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $name;

    #[Rule('required|array')]
    public $permissions;

    public function setForm(Role $role)
    {
        $this->role = $role;

        $this->name = $role->name;
        $this->permissions = $role->permissions->pluck('name')->toArray();
    }

    public function store()
    {
        $role = Role::create($this->except('role'));
        if (isset($this->permissions)) {
            $role->syncPermissions($this->permissions);
        }
        $this->reset();
    }

    public function update()
    {
        $this->role->update($this->except('role'));
        if (isset($this->permissions)) {
            $this->role->syncPermissions($this->permissions);
        }
    }
}