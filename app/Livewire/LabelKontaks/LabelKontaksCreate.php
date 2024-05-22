<?php

namespace App\Livewire\LabelKontaks;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\LabelKontakForm;
use App\Livewire\LabelKontaks\LabelKontaksTable;

class LabelKontaksCreate extends Component
{
    public LabelKontakForm $form;

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $simpan = $this->form->store();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            $this->dispatch('set-reset');
            DB::commit();
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan'.$th->getMessage());
            DB::rollback();
        }

        $this->dispatch('form-create')->to(LabelKontaksTable::class);
    }

    public function render()
    {
        return view('livewire.label-kontaks.label-kontaks-create');
    }
}