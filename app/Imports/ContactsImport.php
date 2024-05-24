<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ContactsImport implements ToModel, WithHeadingRow, WithValidation
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

    /**
     * Rules for validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.nama_lengkap'  => 'required|string|max:255',
            '*.nomor_telepon' => 'required|max:15',
            '*.organisasi'    => 'nullable|string|max:255',
            '*.alamat'        => 'nullable|string|max:255',
            '*.email'         => 'nullable|email|unique:contact,email',
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'nama_lengkap.required'  => 'Nama lengkap harus diisi.',
            'nomor_telepon.required' => 'Nomor telepon harus diisi.',
            'email.required'         => 'Email harus diisi.',
            'email.email'            => 'Format email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
        ];
    }
}