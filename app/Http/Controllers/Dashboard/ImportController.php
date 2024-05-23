<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Imports\ContactsImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importContact()
    {
        // Mendapatkan ID pengguna saat ini
        $userId = Auth::id();

        // Memvalidasi bahwa file yang diunggah adalah file CSV
        // request()->validate([
        //     'file' => 'required|file|mimes:csv,txt|max:10240', // Ubah sesuai kebutuhan
        // ]);

        // Mengimpor data dari file CSV menggunakan Laravel Excel
        Excel::import(new ContactsImport, request()->file('file'));
        try {
            dd('Berhasil');
            // Jika berhasil, kembalikan ke halaman sebelumnya dengan pesan sukses
            return back()->with('success', 'Data berhasil diimpor.');
        } catch (\Exception $e) {
            dd('Gagal ' . $e->getMessage());
            // Jika terjadi kesalahan, kembalikan ke halaman sebelumnya dengan pesan error
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}