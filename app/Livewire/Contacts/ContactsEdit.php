<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use App\Models\LabelKontak;
use Livewire\Attributes\On;
use App\Livewire\Forms\ContactForm;
use App\Livewire\Contacts\ContactsTable;

class ContactsEdit extends Component
{
    public ContactForm $form;

    public $modalEdit = false;
    public $id_label;

    #[On('form-edit')]
    public function set_form(Contact $id)
    {
        // dd('sampai sini');
        $this->form->setForm($id);
        // $get_hobbies = Customer::where('id', $this->form->customer->id)->value('hobbies');
        $this->id_label = LabelKontak::where('id', $this->form->contact->id_label)->value('nama_label');
        // dd($this->id_label);

        // $this->dispatch('set-hobbies-edit', data: collect($get_hobbies));
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

        $this->dispatch('refreshDatatable')->to(ContactsTable::class);
    }

    public function render()
    {
        $labelkontaks = LabelKontak::get();
        return view('livewire.contacts.contacts-edit', compact('labelkontaks'));
    }
}