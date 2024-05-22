<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use App\Livewire\Contacts\ContactsTable;

class ContactsIndex extends Component
{
    public $pesan;
    public function refreshSearch()
    {
        $this->dispatch('adaPesan', pesan: $this->pesan);
    }
    
    public function confirmDelete($get_id)
    {
        try {
            Contact::destroy($get_id);
            $this->dispatch('refreshDatatable')->to(ContactsTable::class);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    public function render()
    {
        return view('livewire.contacts.contacts-index');
    }
}