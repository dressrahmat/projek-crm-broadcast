<?php

namespace App\Livewire\LabelKontaks;

use App\Models\Contact;
use Livewire\Component;
use App\Models\LabelKontak;
use Livewire\Attributes\On;
use App\Livewire\Forms\LabelKontakForm;
use App\Livewire\LabelKontaks\LabelKontaksTable;
use App\Livewire\LabelKontaks\LabelKontaksCreate;

class LabelKontaksEdit extends Component
{
    public LabelKontakForm $form;

    public $modalEdit = false;
    public $kontaks_non_labels = [];

    #[On('form-edit')]
    public function set_form(LabelKontak $id)
    {
        $this->form->setForm($id);
        // Mengambil kontak yang tidak berlabel atau yang berlabel sesuai dengan form
        $this->kontaks_non_labels = Contact::where('id_user', auth()->user()->id)
        ->where(function ($query) {
            $query->whereIn('id', $this->form->kontaks)
                ->orWhereNull('id_label');
        })
        ->get();
        // dd($this->form->kontaks);
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
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal diupdate' . $th->getMessage());
        }

        $this->dispatch('form-edit')->to(LabelKontaksTable::class);
        $this->dispatch('form-edit')->to(LabelKontaksCreate::class);
    }
    public function render()
    {
        return view('livewire.label-kontaks.label-kontaks-edit');
    }
}