<?php

namespace App\Livewire\Devices;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Permission;

class DevicesTable extends Component
{
    use WithPagination;

    public function confirmDelete($get_id)
    {
        try {
            Permission::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    #[On('form-create')]
    #[On('form-edit')]
    #[On('form-delete')]
    public function render()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/get-devices',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ['Authorization: pi3Vo9@Ga!g2i7iR699dMBgP6J8x!xL-moU'],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        return view('livewire.devices.devices-table', compact('data'));
    }
}