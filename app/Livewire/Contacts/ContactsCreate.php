<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\ContactForm;
use App\Livewire\Contacts\ContactsTable;

class ContactsCreate extends Component
{
    public ContactForm $form;
    
    public $modalCreate = false;

    #[On('form-create')]
    public function modal_create()
    {
        $this->modalCreate = true;
    }
    
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

        $this->dispatch('refreshDatatable')->to(ContactsTable::class);
    }
    public function render()
    {
        return view('livewire.contacts.contacts-create');
    }
}