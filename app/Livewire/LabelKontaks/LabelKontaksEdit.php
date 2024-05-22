<?php

namespace App\Livewire\LabelKontaks;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\LabelKontakForm;
use App\Models\LabelKontak;
use App\Livewire\LabelKontaks\LabelKontaksTable;

class LabelKontaksEdit extends Component
{
    public LabelKontakForm $form;

    public $modalEdit = false;

    #[On('form-edit')]
    public function set_form(LabelKontak $id)
    {
        $this->form->setForm($id);

        $this->modalEdit = true;
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

        $this->dispatch('form-edit')->to(LabelKontaksTable::class);
    }
    public function render()
    {
        return view('livewire.label-kontaks.label-kontaks-edit');
    }
}