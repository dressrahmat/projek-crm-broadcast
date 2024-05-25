<?php

namespace App\Livewire\Devices;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Permission;
use App\Livewire\Permissions\PermissionsTable;

class DevicesSendOtp extends Component
{
    public $modalDelete = false;
    public $token;
    public $otp;

    #[On('form-edit')]
    public function set_form(Permission $id)
    {
        $this->form->setForm($id);

        $this->modalPermissionEdit = true;
    }

    #[On('modal-delete-device')]
    public function modalDeleteDevice($token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/delete-device',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => ['otp' => ''],
            CURLOPT_HTTPHEADER => ['Authorization: '. $token],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $response_data = json_decode($response, true);

        if ($response_data['status'] === false) {
            $this->dispatch('sweet-alert', icon: 'error', title: $response_data['reason']);
        } else {
            $this->modalDelete = true;
            $this->token = $token;
        }
    }

    public function deleteDevice()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/delete-device',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => ['otp' => $this->otp],
            CURLOPT_HTTPHEADER => ['Authorization: '. $this->token],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $response_data = json_decode($response, true);

        if ($response_data['status'] === false) {
            $this->dispatch('sweet-alert', icon: 'error', title: $response_data['reason']);
        } else {
            $this->dispatch('sweet-alert', icon: 'success', title: $response_data['detail']);
            $this->modalDelete = false;
        }
        $this->dispatch('delete-success');
    }

    public function edit()
    {
        $this->validate();

        try {
            $simpan = $this->form->update();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil diupdate');
            $this->dispatch('set-reset');
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal diupdate' . $th->getMessage());
        }

        $this->dispatch('form-edit')->to(PermissionsTable::class);
    }
    public function render()
    {
        return view('livewire.devices.devices-send-otp');
    }
}