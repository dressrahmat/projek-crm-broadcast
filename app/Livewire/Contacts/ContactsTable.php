<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use App\Models\LabelKontak;
use Livewire\Attributes\On;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Livewire\Contacts\ContactsIndex;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ContactsTable extends DataTableComponent
{
    public string $tableName = 'contact';
    public array $contact = [];

    public $pesan = 'Assalaamu’alaikum Warahmatullahi Wabarakatuh';
    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
            'sendBroadCast' => 'Kirim Pesan BroadCast',
            'ubahLabel' => 'Ubah Label',
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

        return Excel::download(new ContactsExport($contact), 'contacts.xlsx');
    }
    #[On('adaPesan')]
    public function tangkapPesan($pesan)
    {
        return $this->pesan = $pesan;
    }

    public function ubahLabel()
    {
        $this->dispatch('ubahLabel', pesan: $this->getSelected())->to(ContactsIndex::class);
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

        // Mengambil data dari API Fonnte
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

        // Menggunakan Laravel Collection untuk memfilter data
        $datas = collect($data['data'])->filter(function($device) {
            return $device['status'] == 'connect';
        })->all();

        $device = [];
        foreach ($datas as $data) {
            foreach ($data as $key => $value) {
                $device[$key] = $value;
            }
        }


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
                'Authorization: '. $device['token'], //change TOKEN to your actual token
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        $responseData = json_decode($response, true);

        if ($responseData['status'] === false) {
            $this->dispatch('sweet-alert', icon: 'error', title: $responseData['reason']);
        } else {
            $this->dispatch('sweet-alert', icon: 'success', title: $responseData['detail']);
        }
    }

    public function filters(): array
    {
        $nama_labels = LabelKontak::pluck('nama_label', 'id')->toArray();

        return [
            SelectFilter::make('Projek', 'id_label')
                ->options(['' => 'Semua'] + $nama_labels)
                ->filter(function ($query, $value) {
                    $query->where('id_label', $value);
                }),
            // DateFilter::make('Projek Dibuat')
            //     ->config([
            //         'min' => '2020-01-01',
            //         'max' => '2025-12-31',
            //     ])
            //     ->filter(function (Builder $builder, string $value) {
            //         $builder->where('barang_keluar.created_at', '>=', $value);
            //     }),
            // DateFilter::make('Sampai Dengan')->filter(function (Builder $builder, string $value) {
            //     $builder->where('barang_keluar.created_at', '<=', $value);
            // }),
        ];
    }

    #[On('refreshDatatable')]
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->hideIf(request()->routeIs('contacts.index')), 
            Column::make('Nama lengkap', 'nama_lengkap')->searchable()->sortable(), 
            Column::make('Nomor telepon', 'nomor_telepon')->searchable()->sortable(), 
            Column::make('Label', 'labelkontak.nama_label')->searchable()->sortable(), 
            Column::make('Aksi')->label(fn($row, Column $column) => view('components.partials.datatable.aksi')->withRow($row))];
    }

    public function builder(): Builder
    {
        return Contact::query()->where('id_user', auth()->user()->id);
    }
}