<?php

namespace App\Livewire\LabelKontaks;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\LabelKontak;

class LabelKontaksTable extends Component
{
    use WithPagination;

    public function confirmDelete($get_id)
    {
        try {
            LabelKontak::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    #[On('form-create')]
    #[On('form-edit')]
    #[On('form-delete')]
    public function render()
    {
        $data = LabelKontak::latest()->paginate(5);
        return view('livewire.label-kontaks.label-kontaks-table', compact('data'));
    }
}