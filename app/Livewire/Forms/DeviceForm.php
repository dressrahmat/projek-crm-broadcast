<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class DeviceForm extends Form
{
    public ?Contact $contact;

    public $id;

    #[Rule('required', as: 'Name')]
    public $name;

    #[Rule('required', as: 'Nomor Telepon')]
    public $device;

    #[Rule('nullable', as: 'Organisasi')]
    public $autoread;

    #[Rule('nullable', as: 'Alamat')]
    public $personal;

    #[Rule('nullable', as: 'Label Kontak')]
    public $group;

    public function setForm(Contact $contact)
    {
        $this->contact = $contact;

        $this->name = $contact->name;
        $this->device = $contact->device;
        $this->autoread = $contact->organisasi;
        $this->personal = $contact->personal;
        $this->group = $contact->labelkontak->group;
    }

    public function store()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/add-device',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => ['name' => $this->name, 'device' => $this->device, 'autoread' => $this->autoread, 'personal' => $this->personal, 'group' => $this->group],
            CURLOPT_HTTPHEADER => ['Authorization: pi3Vo9@Ga!g2i7iR699dMBgP6J8x!xL-moU'],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $this->reset();
    }

    public function update()
    {
        $this->contact->update($this->except('contact'));
    }
}