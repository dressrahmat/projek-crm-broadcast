<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    public ?User $user;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $name;

    #[Rule('required|email', as: 'Email')]
    public $email;

    #[Rule('required|min:3', as: 'Password')]
    public $password;

    #[Rule('required|array')]
    public $roles;

    public function setForm(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->roles = $user->roles->pluck('name')->toArray();;
    }

    public function store()
    {
        $this->password = Hash::make($this->password);
        $user = User::create($this->except('user'));
        if ($this->roles) {
            $user->assignRole($this->roles);
        }
        $this->reset();
    }

    public function update()
    {
        $this->user->update($this->except('user'));

        if ($this->roles) {
            $this->user->syncRoles($this->roles);
        }
    }
}