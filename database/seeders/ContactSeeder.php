<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            Contact::factory()->count(10)->create([
                'id_user' => 1,
                'id_label' => function () {
        return rand(1, 3);
    }
            ]);

            Contact::factory()->count(15)->create([
                'id_user' => 2,
                'id_label' => function () {
        return rand(1, 3);
    }
            ]);

            Contact::factory()->count(6)->create([
                'id_user' => 3,
                'id_label' => function () {
        return rand(1, 3);
    }
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}