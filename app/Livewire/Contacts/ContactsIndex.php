<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use App\Models\LabelKontak;
use Livewire\Attributes\On;
use App\Livewire\Contacts\ContactsTable;

class ContactsIndex extends Component
{
    public $pesan;
    public $data_kontak;
    public $ubah_label = false;
    public function refreshSearch()
    {
        $this->dispatch('adaPesan', pesan: $this->pesan);
    }

    #[On('ubahLabel')]
    public function tangkapUbahLabel($pesan)
    {
        $this->ubah_label = true;
        $this->data_kontak = $pesan;
    }

    public function ubahLabel($id)
    { 
        Contact::whereIn('id', $this->data_kontak)->update(['id_label' => $id]);
        $this->dispatch('refreshDatatable')->to(ContactsTable::class);
        $this->dispatch('sweet-alert', icon: 'success', title: 'data label berhasil di ubah');
    }
    
    #[On('adaPesan')]
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
        $labelkontaks = LabelKontak::get();
        return view('livewire.contacts.contacts-index', compact('labelkontaks'));
    }
}