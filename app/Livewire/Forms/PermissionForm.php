<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Form
{
    public ?Permission $permission;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $name;


    public function setForm(Permission $permission)
    {
        $this->permission = $permission;

        $this->name = $permission->name;
    }

    public function store()
    {
        Permission::create($this->except('permission'));
        $this->reset();
    }

    public function update()
    {
        $this->permission->update($this->except('permission'));
    }
}