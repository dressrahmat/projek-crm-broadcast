<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RolesTable extends Component
{
    use WithPagination;

    public function confirmDelete($get_id)
    {
        try {
            Role::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    #[On('form-create')]
    #[On('form-update')]
    #[On('form-delete')]
    public function render()
    {
        $data = Role::latest()->paginate(5);
        return view('livewire.roles.roles-table', compact('data'));
    }
}