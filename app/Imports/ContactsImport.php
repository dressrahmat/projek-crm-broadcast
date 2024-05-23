<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'id_user'     => $row['id_user'],
            'nama_lengkap'     => $row['nama_lengkap'],
            'nomor_telepon'    => $row['nomor_telepon'], 
            'organisasi'    => $row['organisasi'], 
        ]);
    }
}