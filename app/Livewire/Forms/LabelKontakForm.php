<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Contact;
use App\Models\LabelKontak;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use App\Livewire\Contacts\ContactsTable;
use App\Livewire\LabelKontaks\KontaksNonLabelTable;

class LabelKontakForm extends Form
{
    public ?LabelKontak $label_kontak;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $nama_label;

    
    #[Rule('nullable|array', as: 'Kontak')]
    public $kontaks = [];


    public function setForm(LabelKontak $label_kontak)
    {
        $this->label_kontak = $label_kontak;
        $this->nama_label = $label_kontak->nama_label;
        $this->kontaks = $label_kontak->kontak->where('id_user', auth()->user()->id)->pluck('id');
    }

    public function store()
    {
        $simpan = LabelKontak::create($this->except('label_kontak'));
        if ($this->kontaks) {
            Contact::whereIn('id', $this->kontaks)->update(['id_label' => $simpan->id]);
        }
        $this->reset();
    }

    public function update()
    {
        $this->label_kontak->update($this->except('label_kontak'));

        // Mengambil id kontak yang sebelumnya terlabel
        $kontaks_sebelumnya_terlabel = Contact::where('id_user', auth()->user()->id)->where('id_label', $this->label_kontak->id)
            ->whereNotIn('id', $this->kontaks)
            ->get();

        // Memperbarui id_label kontak yang tidak dicentang lagi menjadi null atau kosong
        foreach ($kontaks_sebelumnya_terlabel as $kontak) {
            $kontak->update(['id_label' => null]); // Ubah menjadi null atau kosong
        }

        // Memperbarui id_label kontak yang dicentang
        if ($this->kontaks) {
            Contact::whereIn('id', $this->kontaks)->update(['id_label' => $this->label_kontak->id]);
        }
}
}