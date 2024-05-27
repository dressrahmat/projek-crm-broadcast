<?php

namespace App\Livewire\LabelKontaks;

use Livewire\Component;
use App\Models\LabelKontak;
use App\Livewire\LabelKontaks\LabelKontaksTable;

class LabelKontaksIndex extends Component
{
    public function confirmDelete($get_id)
        {
            try {
                LabelKontak::destroy($get_id);
            } catch (\Throwable $th) {
                $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
            }
            $this->dispatch('delete-success')->to(LabelKontaksTable::class);
        }
    public function render()
    {
        return view('livewire.label-kontaks.label-kontaks-index');
    }
}