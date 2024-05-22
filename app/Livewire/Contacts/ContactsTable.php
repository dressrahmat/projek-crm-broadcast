<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ContactsTable extends DataTableComponent
{
    public string $tableName = 'contact';
    public array $contact = [];
    
    public $pesan = 'pesan default';
    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
            'sendBroadCast' => 'Kirim Pesan BroadCast',
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([5, 10, 25]);
    }

    public function export()
    {
        $contact = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new ContactExport($contact), 'users.xlsx');
    }

    #[On('adaPesan')]
    public function tangkapPesan($pesan)
    {
        return $this->pesan = $pesan;
    }
    
    public function sendBroadCast()
    {
        $id = $this->getSelected();

        $this->clearSelected();

        $contacts = Contact::whereIn('id', $id)->get();

        $nomor_telepon = [];

        foreach ($contacts as $key) {
            $nomor_telepon[] = $key->nomor_telepon;
        }

        $contactsString = implode(',', $nomor_telepon);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $contactsString,
                'message' => $this->pesan,
                'delay' => '2',
                'countryCode' => '62', //optional
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: k#Bvsm_xN_stST+wBC8W', //change TOKEN to your actual token
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);


        // Menggunakan return redirect untuk mengarahkan ke halaman lain setelah eksekusi
        if ($response) {
            $this->dispatch('sweet-alert', icon: 'success', title: 'Pesan broadcast berhasil dikirim.');
        } else {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Gagal mengirim pesan broadcast.'.$th->getMessage());
        }
    }

    public function builder(): Builder
    {
        return Contact::query()
            ->where('id_user', auth()->user()->id);
    }

    #[On('refreshDatatable')]
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->searchable()->sortable(),
            Column::make('Nama lengkap', 'nama_lengkap')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Nomor telepon', 'nomor_telepon')->searchable()->sortable(),
            Column::make('Aksi')
                ->label(fn($row, Column $column) => view('components.partials.button-datatable.edit-button')->withRow($row)),
        ];
    }
}