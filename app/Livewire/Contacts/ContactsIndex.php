<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Livewire\Contacts\ContactsTable;

class ContactsIndex extends Component
{
    public $pesan;
    public function refreshSearch()
    {
        $this->dispatch('adaPesan', pesan: $this->pesan);
    }   

    public function render()
    {
        return view('livewire.contacts.contacts-index');
    }
}