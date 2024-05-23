<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use App\Models\LabelKontak;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Imports\ContactsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Livewire\Contacts\ContactsTable;

class ContactsIndex extends Component
{
    use WithFileUploads;

    public $pesan;
    public $file;
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

    public function import()
    {
        $userId = auth()->user()->id;
        DB::beginTransaction();
        try {
            Excel::import(new ContactsImport($userId), $this->file->getRealPath());
            
            // Jika berhasil, kembalikan ke halaman sebelumnya dengan pesan sukses
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            DB::commit();
        } catch (\Exception $e) {

            // Jika terjadi kesalahan, kembalikan ke halaman sebelumnya dengan pesan error
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan'.$e->getMessage());
            DB::rollback();
        }
        $this->dispatch('refreshDatatable')->to(ContactsTable::class);
    }

    public function render()
    {
        $labelkontaks = LabelKontak::get();
        return view('livewire.contacts.contacts-index', compact('labelkontaks'));
    }
}