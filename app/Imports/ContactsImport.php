<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'id_user'       => $this->userId,
            'nama_lengkap'     => $row['nama_lengkap'],
            'nomor_telepon'    => $row['nomor_telepon'], 
            'organisasi'    => $row['organisasi'] ?? null, 
            'alamat'    => $row['alamat'] ?? null, 
            'email'    => $row['email'] ?? null, 
        ]);
    }

    // public function rules(): array
    // {
    //     return [
    //         'nama_lengkap' => 'required',
    //         'nomor_telepon' => 'required',
    //         'organisasi' => 'nullable',
    //         'alamat' => 'nullable',
    //         'email' => 'nullable',
    //     ];
    // }
}