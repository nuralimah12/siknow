<?php

namespace Database\Seeders;

use App\Models\Departemen as ModelsDepartemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Departemen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsDepartemen::insert([
            [
            'id_divisi' => 1,
            'name' => 'Security dan Tata Kelola Teknologi Informasi',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'id_divisi' => 1,
            'name' => 'Security & Tata Kelola TI',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'id_divisi' => 1,
            'name' => 'IM4 & War Room',
            'created_at' => now(),
            'updated_at' => now()
            ],
        ]);
    }
}
