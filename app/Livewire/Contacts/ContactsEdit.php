<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\ContactForm;

class ContactsEdit extends Component
{
    public ContactForm $form;

    public $modalEdit = false;

    #[On('form-edit')]
    public function set_form(Contact $id)
    {
        // dd('sampai sini');
        $this->form->setForm($id);
        // $get_hobbies = Customer::where('id', $this->form->customer->id)->value('hobbies');

        // $this->dispatch('set-hobbies-edit', data: collect($get_hobbies));
        $this->modalEdit = true;
    }

    public function render()
    {
        return view('livewire.contacts.contacts-edit');
    }
}