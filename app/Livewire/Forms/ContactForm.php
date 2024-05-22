<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Contact;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class ContactForm extends Form
{
    public ?Contact $contact;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $nama_lengkap;

    #[Rule('required|email', as: 'Email')]
    public $email;

    #[Rule('required|min:3', as: 'Nomor Telepon')]
    public $nomor_telepon;

    #[Rule('required|min:3', as: 'Organisasi')]
    public $organisasi;

    #[Rule('required|min:3', as: 'Alamat')]
    public $alamat;

    #[Rule('required', as: 'Label Kontak')]
    public $id_label;


    public function setForm(Contact $contact)
    {
        $this->contact = $contact;
        
        $this->nama_lengkap = $contact->nama_lengkap;
        $this->email = $contact->email;
        $this->nomor_telepon = $contact->nomor_telepon;
        $this->organisasi = $contact->organisasi;
        $this->alamat = $contact->alamat;
        $this->id_label = $contact->labelkontak->id_label;
    }

    public function store()
    {
        Contact::create($this->except('contact'));
        $this->reset();
    }

    public function update()
    {
        $this->contact->update($this->except('contact'));
    }
}