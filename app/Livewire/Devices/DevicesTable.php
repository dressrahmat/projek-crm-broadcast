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
    public $code = 'code';
    public $consent;
    public $status;
    public $url;

    public function confirmDelete($id, $token)
    {
        try {
            // Permission::destroy($get_id);
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.fonnte.com/delete-message',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => ['2' => ''],
                CURLOPT_HTTPHEADER => ['Authorization: ' . $token],
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            dd($response);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    public function connect($token, $device)
    {
        try {
            // Inisialisasi cURL
            $curl = curl_init();

            // Set opsi cURL
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.fonnte.com/qr',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => [
                    'type' => $this->code,
                    'whatsapp' => $device,
                ],
                CURLOPT_HTTPHEADER => ['Authorization: ' . $token],
            ]);

            // Eksekusi permintaan cURL
            $response = curl_exec($curl);

            // Tangani kesalahan cURL
            if (curl_errno($curl)) {
                throw new \Exception(curl_error($curl));
            }

            // Tutup sesi cURL
            curl_close($curl);

            // Decode respons JSON
            $response_data = json_decode($response, true);

            
            if ($response_data['status'] === false) {
                $this->dispatch('sweet-alert', icon: 'error', title: $response_data['reason']);
                // dd('error');
            } else {
                $this->code = $response_data['code'] ?? null;
                $this->consent = $response_data['consent'] ?? null;
                $this->status = $response_data['status'] ?? null;
                $this->url = $response_data['url'] ?? null;

                $this->dispatch('modal-otp-fonnte', icon: 'success', title: $this->code, text: $this->consent);
            }
        } catch (\Throwable $th) {
            // $this->dispatch('sweet-alert', ['icon' => 'error', 'title' => 'Data gagal dihubungkan', 'text' => $th->getMessage()]);
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
        // dd($data);
        return view('livewire.devices.devices-table', compact('data'));
    }
}