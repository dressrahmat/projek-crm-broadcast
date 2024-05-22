<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->count(10)->create([
            'id_user' => 1
        ]);

        Contact::factory()->count(15)->create([
            'id_user' => 2
        ]);

        Contact::factory()->count(6)->create([
            'id_user' => 3
        ]);
    }
}