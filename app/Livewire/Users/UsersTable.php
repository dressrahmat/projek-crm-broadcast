<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public function confirmDelete($get_id)
    {
        try {
            User::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    #[On('form-create')]
    #[On('form-edit')]
    #[On('form-delete')]
    public function render()
    {
        $data = User::latest()->paginate(5);
        return view('livewire.users.users-table', compact('data'));
    }
}