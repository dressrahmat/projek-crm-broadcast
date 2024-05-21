<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsTable extends Component
{
    use WithPagination;

    public function confirmDelete($get_id)
    {
        try {
            Permission::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    #[On('form-create')]
    #[On('form-edit')]
    #[On('form-delete')]
    public function render()
    {
        $data = Permission::latest()->paginate(5);
        return view('livewire.permissions.permissions-table', compact('data'));
    }
}