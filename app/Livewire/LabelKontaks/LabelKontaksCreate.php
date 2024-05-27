<?php

namespace App\Livewire\LabelKontaks;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\LabelKontakForm;
use App\Livewire\LabelKontaks\LabelKontaksTable;
use App\Livewire\LabelKontaks\KontaksNonLabelTable;

class LabelKontaksCreate extends Component
{
    public LabelKontakForm $form;

    public $data_kontak;
    public $search = '';
    public $kontaks_non_labels = [];

    public function mount()
    {
        $this->kontaks_non_labels = Contact::where('id_user', auth()->user()->id)
            ->whereNull('id_label')
            ->get();
    }
    
    #[On('tambahLabel')]
    public function tangkapUbahLabel($data)
    {
        $this->data_kontak = $data;
    }
    public function save()
    {

        DB::beginTransaction();
        try {
            $simpan = $this->form->store();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            $this->dispatch('set-reset');
            DB::commit();
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal disimpan', text:$th->getMessage());
            DB::rollback();
        }

        $this->dispatch('form-create')->to(LabelKontaksTable::class);
    }

    public function refreshSearch()
    {
    if ($this->search != '') {
        $this->kontaks_non_labels = Contact::where('id_user', auth()->user()->id)
            ->where(function ($query) {
                $query->where('nama_lengkap', 'like', '%' . $this->search . '%')
                    ->orWhere('nomor_telepon', 'like', '%' . $this->search . '%');
            })
            ->whereNull('id_label')
            ->get();
    } else {
        $this->kontaks_non_labels = Contact::where('id_user', auth()->user()->id)
            ->whereNull('id_label')
            ->get();
    }
}

    #[On('form-edit')]
    public function render()
    {
        return view('livewire.label-kontaks.label-kontaks-create');
    }
}