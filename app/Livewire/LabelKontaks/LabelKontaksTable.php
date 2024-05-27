<?php

namespace App\Livewire\LabelKontaks;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\LabelKontak;

class LabelKontaksTable extends Component
{
    use WithPagination;

    #[On('form-create')]
    #[On('form-edit')]
    #[On('form-delete')]
    #[On('delete-success')]
    public function render()
    {
        $data = LabelKontak::latest()->paginate(5);
        return view('livewire.label-kontaks.label-kontaks-table', compact('data'));
    }
}