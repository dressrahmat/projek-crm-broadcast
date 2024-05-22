<?php

namespace Database\Seeders;

use App\Models\LabelKontak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabelKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama_label = [
            'Donatur SPA',
            'Donatur SIB',
            'Donatur Wakaf Pembangunan'
        ];
        DB::beginTransaction();
        try {
            foreach($nama_label as $label){
                LabelKontak::create([
                    'nama_label' => $label
                ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}