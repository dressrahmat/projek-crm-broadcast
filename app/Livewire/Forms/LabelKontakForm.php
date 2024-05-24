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

    
    #[Rule('required|array', as: 'Kontak')]
    public $kontaks = [];


    public function setForm(LabelKontak $label_kontak)
    {
        $this->label_kontak = $label_kontak;

        $this->nama_label = $label_kontak->nama_label;
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
    }
}