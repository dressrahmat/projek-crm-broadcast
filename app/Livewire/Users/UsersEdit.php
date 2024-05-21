<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;
use App\Livewire\Users\UsersTable;
use Spatie\Permission\Models\Role;

class UsersEdit extends Component
{
    public UserForm $form;

    public $modalUserEdit = false;

    #[On('form-edit')]
    public function set_form(User $id)
    {
        $this->form->setForm($id);
        $get_roles = Role::whereIn('id', $this->form->user->roles->pluck('id'))->pluck('name');
        // dd($get_roles, $this->form->user->roles->pluck('id'));

        $this->dispatch('set-roles-edit', data: collect($get_roles));
        $this->modalUserEdit = true;
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

        $this->dispatch('form-edit')->to(UsersTable::class);
    }
    public function render()
    {
        $data = Role::get();
        return view('livewire.users.users-edit', compact('data'));
    }
}